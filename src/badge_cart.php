<?php include 'db_conn.php';
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$sql = "SELECT COUNT(id) FROM cart_items_tbl WHERE user_id=$user_id AND order_id IS NULL";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['COUNT(id)'];
$conn->close();