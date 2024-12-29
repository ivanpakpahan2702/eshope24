<?php include 'db_conn.php';
$user_id = $_POST['user_id'];
$sql = "SELECT * FROM orders_tbl WHERE user_id=$user_id AND status='settlement'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<ul class="list-group">';
    while ($row = $result->fetch_assoc()) {
?>
<li class="list-group-item">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                Status Selesai
            </h5>
            <div class="card-text">
                <hr />
                <div class="mb-3">
                    <label for="order_id"
                        class="form-label mb-2">Order
                        Id
                    </label>
                    <input class="form-control"
                        id="order_id"
                        value="<?php echo $row['id']; ?>">
                    <label for="tanggal"
                        class="form-label mb-2">Tanggal
                    </label>
                    <input class="form-control"
                        id="tanggal"
                        value="<?php echo $row['updated_at']; ?>">
                </div>
                <hr />
                <div class="detail-produk">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Nama Produk
                                </th>
                                <th scope="col">
                                    Harga/Satuan
                                </th>
                                <th scope="col">
                                    Jumlah Satuan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $product_sql = "
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
                            cart_items_tbl.user_id = $user_id AND cart_items_tbl.order_id = " . $row['id'] . " 
                            GROUP BY 
                            products_tbl.id, cart_items_tbl.user_id, products_tbl.name, products_tbl.price, products_tbl.image;
                            ";
                                    $product_result = $conn->query($product_sql);
                                    if ($product_result->num_rows > 0) {
                                        while ($product_row = $product_result->fetch_assoc()) {
                                    ?>
                            <tr>
                                <td><?php echo $product_row['product_name']; ?>
                                </td>
                                <td><?php echo $product_row['price']; ?>
                                </td>
                                <td><?php echo $product_row['total_product']; ?>
                                </td>
                            </tr>
                            <?php
                                        }
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
                <button
                    id="pay-<?php echo $row['token'] ?>"
                    class="btn btn-info view-notif">Lihat
                </button>
            </div>
        </div>
    </div>
</li>
<?php
    }
    echo '</ul>';
} else {
    echo 'Anda tidak memiliki Pembayaran yang selesai';
}
$conn->close();