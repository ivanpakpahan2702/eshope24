<?php include 'db_conn.php';
$sql = "
SELECT 
products_tbl.id AS id, 
cart_items_tbl.user_id AS user_id, 
products_tbl.name AS product_name, 
products_tbl.price AS price,
products_tbl.stock AS stock, 
products_tbl.image AS product_image, 
COUNT(cart_items_tbl.product_id) AS sub_total
FROM 
cart_items_tbl
INNER JOIN 
products_tbl ON cart_items_tbl.product_id = products_tbl.id
WHERE 
cart_items_tbl.user_id = 1
GROUP BY 
products_tbl.id, cart_items_tbl.user_id, products_tbl.name, products_tbl.price, products_tbl.image;
";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo '<ul class="list-group">';
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <li class="list-group-item">
            <div class="card">
                <img
                    src="assets/products/<?php echo $row['product_image'] ?>"
                    class="card-img-top"
                    alt="..." />
                <div class="card-body p-2">
                    <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                    <p class="card-text">
                        <hr />
                        <small><strong><?php echo "Rp" . number_format(($row['price']), 2, ",", ".") ?></strong></small>
                    </p>

                    <div class="d-flex mb-4">
                        <label for="sub_total" class="me-2">Jumlah (Kg)</label>
                        <button id="<?php echo $row['id'] ?>" class="btn minus cart-btn-minus me-2">-</button>
                        <input class="form-control" id="sub_total" type="text" value="<?php echo $row['sub_total']; ?>" style="text-align: center;" min="0" max="<?php echo $row['stock']; ?>" disabled />
                        <button id="<?php echo $row['id'] ?>" class="btn ms-2 cart-btn">+</button>
                    </div>

                </div>
            </div>
        </li>
<?php
    }
    echo '</ul>';
} else {
    echo 'Anda tidak memiliki Wishlist';
}
