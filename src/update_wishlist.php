<?php include '/src/db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['$product_id'];
    $user_id = $_POST['$user_id'];
    $sql = "SELECT * FROM wishlist_items_tbl WHERE user_id = $user_id AND product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['product_id'];
        }
    }
    // $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    // if ($conn->query($sql) === true) {
    //     echo "User created successfully.";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    // $conn->close();
}
