<?php
session_start();

include('../src/db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM users_tbl WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'],)) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $username;
                $_SESSION['login_status'] = 1;
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION['login_status'] = 2;
                header("Location: auth.php");
                exit();
            }
        } else {
            $_SESSION['login_status'] = 3;
            header("Location: auth.php");
            exit();
        }
    }
}
$conn->close();
