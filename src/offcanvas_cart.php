<?php include 'db_conn.php';
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$sql = "
SELECT 
products_tbl.id AS id, 
cart_items_tbl.user_id AS user_id, 
products_tbl.name AS product_name, 
products_tbl.price AS price,
products_tbl.stock AS stock, 
products_tbl.image AS product_image, 
COUNT(cart_items_tbl.product_id) AS total_product
FROM 
cart_items_tbl
INNER JOIN 
products_tbl ON cart_items_tbl.product_id = products_tbl.id
WHERE 
cart_items_tbl.user_id = $user_id AND cart_items_tbl.order_id IS NULL 
GROUP BY 
products_tbl.id, cart_items_tbl.user_id, products_tbl.name, products_tbl.price, products_tbl.image;
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<ul class="list-group">';
    while ($row = $result->fetch_assoc()) {
?>
        <li class="list-group-item">
            <div class="card">
                <input type="hidden"
                    name="product_id_cart"
                    value="checkout-<?php echo $row['id']; ?>">
                <img src="assets/products/<?php echo $row['product_image'] ?>"
                    class="card-img-top"
                    alt="gambar produk" />
                <div class="card-body p-2">
                    <h5 class="card-title">
                        <?php echo $row['product_name']; ?>
                    </h5>
                    <p class="card-text">
                        <hr />
                        <small><strong><?php echo "Rp" . number_format(($row['price']), 2, ",", ".") ?></strong></small>
                    </p>
                    <div class="d-flex mb-4">
                        <label for="sub_total"
                            class="form-label me-2">Jumlah
                            (Kg)</label>
                        <button
                            id="cart-<?php echo $row['id'] ?>"
                            class="btn minus btn-danger cart-btn-minus me-2">-</button>
                        <input class="form-control"
                            name="total_product"
                            type="text"
                            value="<?php echo $row['total_product']; ?>"
                            style="text-align: center;"
                            disabled />
                        <button
                            id="cart-<?php echo $row['id'] ?>"
                            class="btn ms-2 btn-success cart-btn-plus">+</button>
                    </div>
                </div>
            </div>
        </li>
    <?php
    }
    $sql = "
    SELECT SUM(products_tbl.price) AS total_harga
    FROM cart_items_tbl
    JOIN products_tbl ON cart_items_tbl.product_id = products_tbl.id WHERE cart_items_tbl.user_id=$user_id AND cart_items_tbl.order_id IS NULL;
    ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    </ul>
    <div class="d-flex mb-5 p-2">
        <label for="total-transaction"
            class="form-label me-5">Total</label>
        <input id="total-transaction" type="text"
            class="form-control" disabled
            style="text-align: center;"
            value="<?php echo "Rp" . number_format(($row['total_harga']), 2, ",", ".") ?>">
    </div>
    <div class="user-form p-2">
        <h2>Formulir Pembeli</h2>
        <hr>
        <label for="name"
            class="form-label">Nama</label>
        <input type="text" class="form-control mb-2"
            name="name" id="name">
        <label for="email"
            class="form-label">Email</label>
        <input type="email" class="form-control mb-2"
            name="email" id="email">
        <label for="no_hp" class="form-label">No
            Ponsel Aktif</label>
        <input type="text" class="form-control mb-2"
            name="no_hp" id="no_hp">
        <label for="address" class="form-label">Alamat
            saat ini</label>
        <input type="text" class="form-control mb-2"
            name="address" id="address">
        <label for="postal_code"
            class="form-label">Kode Pos</label>
        <input type="text" class="form-control mb-2"
            name="postal_code" id="postal_code">
        <button id="check_out_btn" type="button"
            class="btn btn-primary mt-5">Checkouts</button>
    </div>
<?php
} else {
    echo 'Anda tidak memiliki barang belanja';
}
$conn->close();
