<?php include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = substr($_POST['product_id'], 5);
    $product_id = mysqli_real_escape_string($conn, $product_id);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $status = $_POST['status'];

    if ($status == 1) {
        $sql = "INSERT INTO cart_items_tbl (product_id,user_id) VALUES ($product_id,$user_id)";
        $alert = '1';
    } elseif ($status == 2) {
        $sql = "INSERT INTO cart_items_tbl (product_id,user_id) VALUES ($product_id,$user_id)";
        $alert = null;
    } else {
        $sql = "
        DELETE FROM cart_items_tbl
        WHERE id = (
            SELECT id FROM cart_items_tbl WHERE product_id = $product_id AND user_id = $user_id ORDER BY id DESC LIMIT 1
            );";
        $alert = null;
    }
    try {
        $result = $conn->query($sql);
        $conn->commit();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    if ($alert) {
        echo $alert;
    }
    $conn->close();
}