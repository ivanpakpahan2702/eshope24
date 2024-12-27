<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1" />
    <title>Eshope 2024</title>
    <link rel="shortcut icon"
        href="../assets/images/slack.png"
        type="image/x-icon">
    <link rel="stylesheet"
        href="../assets/bootstrap_5_3_3/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="../assets/bootstrap-icons_1_11_3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet"
        href="../src/style.css" />
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle"
        style="max-width:500px;min-width:320px">
        <ul class="nav nav-tabs bg-body"
            id="myTab" role="tablist">
            <li class="nav-item"
                role="presentation">
                <button class="nav-link active"
                    id="login-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#login-tab-pane"
                    type="button" role="tab"
                    aria-controls="login-tab-pane"
                    aria-selected="true">Login</button>
            </li>
            <li class="nav-item"
                role="presentation">
                <button class="nav-link"
                    id="register-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#register-tab-pane"
                    type="button" role="tab"
                    aria-controls="register-tab-pane"
                    aria-selected="false">Register</button>
            </li>
        </ul>
        <div class="tab-content"
            id="myTabContent">
            <div class="bg-body tab-pane fade show active"
                id="login-tab-pane"
                role="tabpanel"
                aria-labelledby="login-tab"
                tabindex="0">
                <form action="login_process.php"
                    class="p-4" method="POST">
                    <label for="username"
                        class="form-label">Username:</label>
                    <input type="text"
                        name="username" required
                        class="form-control">
                    <label for="password"
                        class="form-label">Password:</label>
                    <input type="password"
                        name="password" required
                        class="form-control mb-2">
                    <button type="submit"
                        class="btn btn-success"
                        name="login">Login</button>
                </form>
            </div>
            <div class="bg-body tab-pane fade"
                id="register-tab-pane"
                role="tabpanel"
                aria-labelledby="register-tab"
                tabindex="0">
                <form
                    action="register_process.php"
                    class="p-4" method="POST">
                    <label for="name"
                        class="form-label">Nama:</label>
                    <input type="text" name="name"
                        required
                        class="form-control">
                    <label for="username"
                        class="form-label">Username:</label>
                    <input type="text"
                        name="username" required
                        class="form-control">
                    <label for="password"
                        class="form-label">Password:</label>
                    <input type="password"
                        name="password" required
                        class="form-control mb-2">
                    <button type="submit"
                        class="btn btn-success"
                        name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
    <script
        src="../assets/bootstrap_5_3_3/js/bootstrap.bundle.min.js">
    </script>
    <script
        src="../assets/jquery_3_5_1/jquery.min.js">
    </script>
    <script
        src="../assets/sweetalert2_11_15_3/sweetalert.js">
    </script>
    <?php
    // regis notification
    if (isset($_SESSION['regis_status'])) {
        if ($_SESSION['regis_status'] == 1) {
            $message = "Registrasi berhasil, silahkan login kembali!";
            $icon = "success";
        } elseif ($_SESSION['regis_status'] == 2) {
            $message = $_SESSION["message_error"];
            $icon = "error";
        }
        echo "
            <script>
            Swal.fire({
                title: 'Notifikasi!',
                html: '$message',
                icon: '$icon',
                confirmButtonText: 'Ok'
            })
            </script>
            ";
        $_SESSION['regis_status'] = null;
        $_SESSION['message_error'] = null;
    }
    // login notification
    if (isset($_SESSION['login_status'])) {
        if ($_SESSION['login_status'] == 2) {
            $message = "Password Salah!";
            $icon = "error";
        } elseif ($_SESSION['login_status'] == 3) {
            $message = "User tak ditemukan";
            $icon = "error";
        }
        echo "
            <script>
            Swal.fire({
                title: 'Notifikasi!',
                text: '$message',
                icon: '$icon',
                confirmButtonText: 'Ok'
            })
            </script>
            ";
        $_SESSION['login_status'] = null;
    }
    ?>
</body>

</html>