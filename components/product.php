<div class="product-container rounded bg-body mt-5 ps-4 pe-4 pb-4">
  <h4 class="text-center pt-5 pb-5">Our Products</h4>
  <hr />
  <!-- Row -->
  <div class="row">
    <!-- Produk -->
    <?php
    $sql1 = 'SELECT * FROM products_tbl';
    $result1 = mysqli_query($conn, $sql1);
    $sql2 = 'SELECT * FROM wishlist_items_tbl WHERE user_id=1';
    $result2 = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result2) > 0) {
      while ($row = mysqli_fetch_assoc($result2)) {
        $wishlisted[] = $row['product_id'];
      }
    } else {
      $wishlisted[] = 0;
    }
    if (mysqli_num_rows($result1) > 0) {
      while ($row = mysqli_fetch_assoc($result1)) {
        $isWishlisted = in_array($row['id'], $wishlisted);
    ?>
        <div class="col-md-4 mt-2 mb-2" id="<?php echo $row['id'] ?>">
          <div class="card">
            <img
              src="assets/products/<?php echo $row['image'] ?>"
              class="card-img-top"
              alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name'] ?></h5>
              <p class="card-text">
                <?php echo substr($row['description'], 0, -60) . "..." ?>
                <br />
                <small><strong><?php echo "Rp" . number_format(($row['price']), 2, ",", ".") ?></strong></small>
              </p>
              <button
                id="<?php echo $row['id'] ?>"
                class="btn btn-info bi bi-eye view-btn"></button>
              <button
                id="<?php echo $row['id'] ?>"
                class="btn btn-success bi bi-cart-plus-fill cart-btn"></button>
              <button
                id="<?php echo $row['id'] ?>"
                class="btn btn-light like-btn <?php echo ($isWishlisted != 0) ? 'is-active' : ''; ?>">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-heart-fill"
                  viewBox="0 0 16 16">
                  <path
                    fill-rule="evenodd"
                    d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                </svg>
              </button>
            </div>
          </div>
        </div>
    <?php
      }
    } else {
      echo '<h4>Maaf, produk kami sedang kehabisan stok</h4>';
    }
    ?>
  </div>
</div>