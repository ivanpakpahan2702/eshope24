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
                        :</label>
                    <input class="form-control"
                        id="order_id"
                        value="<?php echo $row['id']; ?>">
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
    echo 'Anda tidak memiliki Pembayaran yang di pending';
}
$conn->close();