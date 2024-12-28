<?php
// File: midtrans-notification.php
include('../src/db_conn.php');


// Tangkap data dari Midtrans (POST)
$rawData = file_get_contents('php://input');
$data = json_decode($rawData, true);

// Cek apakah data valid
if ($data && isset($data['status_code'])) {
    // Ambil data penting dari notifikasi Midtrans
    $order_id = $data['order_id'];
    $status = $data['transaction_status'];

    // Lakukan update status di database
    updateTransactionStatus($conn, $order_id, $status);
    echo 'Mantap';
} else {
    // Jika status bukan success, bisa log atau tangani sesuai kebutuhan
    error_log('Transaction failed or invalid notification.');
    echo 'Betul';
}

// Fungsi untuk update status transaksi di database
function updateTransactionStatus($conn, $order_id, $status)
{
    // Update query untuk mengubah status transaksi

    $sql = "UPDATE orders_tbl SET status = '$status' WHERE id = '$order_id'";
    $conn->query($sql);
    $conn->commit();
    $conn->close();
}