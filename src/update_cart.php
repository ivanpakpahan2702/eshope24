<?php include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];

    if ($status == 1) {
        $sql = "INSERT INTO cart_items_tbl (product_id,user_id) VALUES ($product_id,$user_id)";
        mysqli_query($conn, $sql);
        mysqli_commit($conn);
        // if (mysqli_num_rows($result) > 0) {
        //     $sql = "DELETE FROM wishlist_items_tbl WHERE user_id = $user_id AND product_id = $product_id";
        //     mysqli_query($conn, $sql);
        //     mysqli_commit($conn);
        // } else {
        //     $sql = "INSERT INTO wishlist_items_tbl (product_id,user_id) VALUES ($product_id,$user_id)";
        //     mysqli_query($conn, $sql);
        //     mysqli_commit($conn);
        // }
    }
}