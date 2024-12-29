<?php
/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php

Alternatively, if you are not using **Composer**, you can download midtrans-php library
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require
the file manually.
*/

require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';
include 'db_conn.php';
session_start(); // Start the session
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-BWbOLm34Sm7UG6sV9IpG4N21';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$item_details = [];
$total_transaction = 0;
$products = json_decode($_POST['products_id_amount_list'], true);
foreach ($products as $product) {
    $sql = "SELECT *,(price*" . $product['amountProduct'] . ") as subTotal FROM products_tbl WHERE id =" . substr($product['productId'], 9);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total_transaction += $row['subTotal'];
            $item_details[] = array(
                'id' => $row['id'],
                'price' => $row['price'],
                'quantity' => $product['amountProduct'],
                'name' => $row['name'],
                'sub_total' => $row['subTotal'],
            );
        }
    }
}
$order_id = rand();

$params = array(
    'transaction_details' => array(
        'order_id' => $order_id,
        'gross_amount' => $total_transaction,
    ),
    'item_details' => $item_details,
    'customer_details' => array(
        'first_name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['no_hp'],
        'shipping_address' => array(
            "first_name" => $_POST['name'],
            "address" => $_POST['address'],
            "postal_code" => $_POST['postal_code'],
            "phone" => $_POST['no_hp'],
        ),
    ),
);


$snapToken = \Midtrans\Snap::getSnapToken($params);
$data = array($order_id, $snapToken);

$order_id = mysqli_real_escape_string($conn, $order_id);
$user_id = mysqli_real_escape_string($conn, $user_id);
$snapToken = mysqli_real_escape_string($conn, $snapToken);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
$postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
$email = mysqli_real_escape_string($conn, $_POST['email']);



$sql = "
INSERT INTO orders_tbl (id, user_id, token, name, phone, email,postal_code, address) 
VALUES ('$order_id', '$user_id', '$snapToken', '$name', '$no_hp', '$email', '$postal_code', '$address')
";
$result = $conn->query($sql);
$conn->commit();

$sql = "
UPDATE cart_items_tbl set order_id = '$order_id' where user_id = '$user_id' AND order_id IS NULL";

$result = $conn->query($sql);
$conn->commit();

$conn->close();

echo json_encode($data);