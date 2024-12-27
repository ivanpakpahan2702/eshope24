<?php include 'db_conn.php';
$user_id = $_POST['user_id'];
$sql = "SELECT COUNT(id) FROM wishlist_items_tbl WHERE user_id=$user_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['COUNT(id)'];
$conn->close();
