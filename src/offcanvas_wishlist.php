<?php include 'db_conn.php';
$sql = "SELECT products_tbl.id AS id, wishlist_items_tbl.user_id AS user_id, products_tbl.name AS product_name,products_tbl.price AS price, products_tbl.image AS product_image
FROM wishlist_items_tbl
INNER JOIN products_tbl ON wishlist_items_tbl.product_id = products_tbl.id WHERE wishlist_items_tbl.user_id=1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo '<ul class="list-group">';
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <li class="list-group-item">
            <div class="card">
                <input type="hidden" name="product_id" id="product_id" value="<?php echo $row['id']; ?>">
                <img
                    src="assets/products/<?php echo $row['product_image'] ?>"
                    class="card-img-top"
                    alt="..." />
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                    <p class="card-text">
                        <hr />
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
                        class="btn btn-light like-btn is-active">
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
        </li>
<?php
    }
    echo '</ul>';
} else {
    echo 'Anda tidak memiliki Wishlist';
}
