<?php include 'db_conn.php';
$sql = "SELECT COUNT(id) FROM wishlist_items_tbl WHERE user_id=1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
echo $data['COUNT(id)'];
