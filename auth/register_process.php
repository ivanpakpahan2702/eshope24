<?php
session_start();

include('../src/db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $name = mysqli_real_escape_string($conn, $name);
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users_tbl (name,username, password) VALUES ('$name','$username', '$password_hashed')";

        try {
            if ($conn->query($sql) === TRUE) {
                $_SESSION['regis_status'] = 1;
            }
        } catch (Exception $e) {
            $_SESSION['regis_status'] = 2;
            $_SESSION['message_error'] = strtr(("Error: " . $e->getMessage()), ["'" => ""]);
        }
    }
}
$conn->commit();
$conn->close();
header("Location: auth.php");
exit();