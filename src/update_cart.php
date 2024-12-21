<?php include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];

    if ($status == 1) {
        $sql = "INSERT INTO cart_items_tbl (product_id,user_id) VALUES ($product_id,$user_id)";
        mysqli_query($conn, $sql);
        mysqli_commit($conn);
    } else {
        $sql = "
        DELETE FROM cart_items_tbl
        WHERE id = (
            SELECT id FROM cart_items_tbl WHERE product_id = $product_id AND user_id = $user_id ORDER BY id DESC LIMIT 1
            );";
        mysqli_query($conn, $sql);
        mysqli_commit($conn);
    }
}
