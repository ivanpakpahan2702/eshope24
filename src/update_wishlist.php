<?php include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $sql = "SELECT * FROM wishlist_items_tbl WHERE user_id = $user_id AND product_id = $product_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql = "DELETE FROM wishlist_items_tbl WHERE user_id = $user_id AND product_id = $product_id";
    } else {
        $sql = "INSERT INTO wishlist_items_tbl (product_id,user_id) VALUES ($product_id,$user_id)";
    }
    $result = $conn->query($sql);
    $conn->commit();
    $conn->close();
}
