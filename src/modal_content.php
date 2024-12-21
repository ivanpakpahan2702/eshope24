<?php include 'db_conn.php';
$id = $_POST['id'];
$sql = "SELECT * FROM products_tbl WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <input type="hidden" name="modal-product-id" id="modal_product_id" value="<?php echo $row['id'] ?>">
                <div class="modal-header">
                    <div class="modal-title fs-5" id="modal_product_name"><?php echo $row['name'] ?></div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img src="assets/products/<?php echo $row['image'] ?>" alt="" class="responsive">
                    </div>
                    <div id="modal_product_description">
                        <?php echo $row['description'] ?>
                    </div>
                    <hr>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Harga</td>
                                <td><?php echo "Rp" . number_format(($row['price']), 2, ",", ".") ?>/Kg</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><?php echo $row['stock'] ?> Kg</td>
                            </tr>
                    </table>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button
                        class="btn btn-success bi bi-cart-plus-fill cart-btn"></button>
                </div>
            </div>
        </div>
<?php
    }
}

?>