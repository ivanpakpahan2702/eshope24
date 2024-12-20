function update_wishlist($product_id, $user_id) {
  $.ajax({
    url: "src/update_wishlist.php",
    method: "POST",
    data: {
      product_id: $product_id,
      user_id: $user_id,
    },
    success: function (response) {
      $("#badge-wishlist").load("src/badge_wishlist.php");
      $("#daftar-wishlist").load("src/offcanvas_wishlist.php");
    },
    error: function (xhr, status, error) {
      console.log("Terjadi kesalahan: " + error);
    },
  });
}

$(document).ready(function () {
  $("#badge-wishlist").load("src/badge_wishlist.php");
  $("#daftar-wishlist").load("src/offcanvas_wishlist.php");
  $(document).on("click", ".like-btn", function () {
    $("#" + this.id + " .like-btn").toggleClass("is-active");
    update_wishlist(this.id, 1);
  });
});
