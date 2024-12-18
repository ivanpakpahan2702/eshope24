<?php include 'src/db_conn.php'?>
<?php include 'templates/header.php'?>
  <body>
    <div class="container mt-2 mb-5">
      <!-- Navbar -->
      <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand"
            ><strong>Eshope<span class="logo-24">24</span></strong></a
          >
          <div class="d-flex mt-1">
            <!-- Wishlist -->
            <button
              type="button"
              class="btn btn-warning position-relative me-3"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasWishlist"
              aria-controls="offcanvasExample"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-heart-fill"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"
                />
              </svg>
              <!-- Badge Wishlist -->
              <span
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                id="badge-wishlist"
              >
                0
                <span class="visually-hidden">wishlist</span>
              </span>
            </button>
            <!-- Cart -->
            <button
              type="button"
              class="btn btn-primary position-relative"
              data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasCart"
              aria-controls="offcanvasExample"
            >
              <i class="bi bi-cart"></i>
              <!-- Badge Cart -->
              <span
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                id="badge-cart"
              >
                0
                <span class="visually-hidden">cart</span>
              </span>
            </button>
          </div>
        </div>
      </nav>

      <!-- Carousel -->
      <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner rounded-bottom">
          <div class="carousel-item active">
            <img
              src="https://placehold.co/1200x300?text=Promo+1&font=raleway"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://placehold.co/1200x300?text=Promo+2&font=raleway"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://placehold.co/1200x300?text=Promo+3&font=raleway"
              class="d-block w-100"
              alt="..."
            />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleFade"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleFade"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- About Us-->
      <div class="about-us bg-body rounded mt-5 ps-4 pe-4 pb-4">
        <h4 class="text-center pt-5 pb-5">About Us</h4>
        <hr />
        <img
          src="assets/images/garden.jpg"
          alt=""
          class="left-side responsive"
        />
        <p>
          Selamat Datang di Toko Buah Segar Kami! Kami adalah toko kecil yang
          berada di jantung komunitas, berdedikasi untuk menyediakan buah-buahan
          segar dan berkualitas untuk Anda dan keluarga. Dengan pengalaman
          bertahun-tahun dalam dunia perdagangan buah, kami mengerti betapa
          pentingnya konsumsi buah segar bagi kesehatan dan gaya hidup yang
          seimbang.
        </p>
        <p>
          Kami bangga bekerja sama dengan petani lokal untuk memastikan bahwa
          setiap buah yang kami tawarkan adalah hasil terbaik dari ladang. Dari
          apel yang renyah, jeruk yang manis, hingga buah tropis eksotis seperti
          mangga dan nanas, kami berkomitmen untuk hanya menjual produk yang
          segar dan berkualitas tinggi.
        </p>
        <p>
          Dengan hadirnya website kami, kini Anda dapat dengan mudah memesan
          berbagai macam buah segar tanpa harus keluar rumah. Cukup akses
          website kami, pilih buah-buahan yang Anda inginkan, dan kami akan
          mengantarkannya langsung ke pintu rumah Anda. Kami juga menawarkan
          berbagai paket pilihan, sehingga Anda dapat memilih sesuai kebutuhan
          keluarga atau acara khusus. Kami percaya bahwa setiap orang berhak
          menikmati buah-buahan segar tanpa harus mengeluarkan biaya yang
          terlalu tinggi. Itu sebabnya kami juga berusaha untuk memberikan harga
          yang kompetitif, tanpa mengorbankan kualitas.
        </p>
        <p>
          ragu untuk menjelajahi berbagai produk kami di website, dan ikuti juga
          promosi dan penawaran spesial yang kami berikan. Kami sangat
          menghargai setiap dukungan dari pelanggan, dan berkomitmen untuk terus
          meningkatkan pelayanan kami. Terima kasih telah memilih kami sebagai
          sumber buah segar Anda. Mari jaga kesehatan bersama dengan menikmati
          buah-buahan segar dari toko kami!
        </p>
      </div>

      <!-- Product -->
      <?php include 'templates/product.php'?>
    </div>
    
    <!-- Offcanvas Wishlists -->
    <div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      id="offcanvasWishlist"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">wishlist</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body">
        Daftar wishlists
        <br />
        <p id="daftar-wishlist"></p>
      </div>
    </div>
    <!-- Offcanvas Cart -->
    <div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      id="offcanvasCart"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
          Keranjang Belanja
        </h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body">Daftar barang</div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
      integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="src/script.js"></script>
  </body>
</html>
