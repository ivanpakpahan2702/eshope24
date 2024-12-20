<?php include 'src/db_conn.php' ?>
<?php include 'components/header.php' ?>

<body>
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

  <!--Offcanvas-->
  <?php include 'components/offcanvas.php'; ?>


  <script src="assets/bootstrap_5_3_3/js/bootstrap.bundle.min.js"></script>
  <script src="assets/jquery_3_5_1/jquery.min.js"></script>
  <script src="src/script.js"></script>
</body>

</html>