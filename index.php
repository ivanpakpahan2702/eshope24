<?php
include 'src/db_conn.php';

session_start(); // Start the session
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: auth/auth.php");
  exit();
}
?>

<?php include 'components/header.php'; ?>

<body>
    <input type="hidden" id="session-user-id"
        value="<?php echo htmlspecialchars($user_id); ?>">

    <div class="container mt-2 mb-5">
        <!-- Navbar -->
        <?php include 'components/navbar.php'; ?>

        <!-- Carousel -->
        <?php include 'components/carousel.php'; ?>

        <!-- About Us-->
        <?php include 'components/about_us.php'; ?>

        <!-- Product -->
        <?php include 'components/product.php' ?>
    </div>

    <!-- Offcanvas -->
    <?php include 'components/offcanvas.php'; ?>

    <!-- Modal -->
    <?php include 'components/modal.php'; ?>

    <script
        src="assets/bootstrap_5_3_3/js/bootstrap.bundle.min.js">
    </script>
    <script
        src="assets/jquery_3_5_1/jquery.min.js">
    </script>
    <script
        src="assets/sweetalert2_11_15_3/sweetalert.js">
    </script>
    <script src="src/script.js"></script>

    <!-- login notification -->
    <?php
  if (isset($_SESSION['login_status'])) {
    if ($_SESSION['login_status'] == 1) {
      echo "
            <script>
            Swal.fire({
                title: 'Berhasil Login!',
                text: 'Halo " . $_SESSION['username'] . "!',
                icon: 'info',
                confirmButtonText: 'Ok'
            })
            </script>
            ";
    }
    $_SESSION['login_status'] = null;
  }
  ?>

</body>

</html>