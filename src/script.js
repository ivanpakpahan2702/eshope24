function update_wishlist($product_id, $user_id) {
  $.ajax({
    url: "src/update_wishlist.php",
    method: "POST",
    data: {
      product_id: $product_id,
      user_id: $user_id,
    },
    success: function (response) {
      alert("Anda menyukai produk ini");
    },
  });
}

$(document).ready(function () {
  $(".like-btn").click(function () {
    $("#" + this.id + " .like-btn").toggleClass("is-active");
    update_wishlist(this.id, "1");
  });
});
