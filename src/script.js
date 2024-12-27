// like
function update_wishlist($product_id, $user_id) {
  $.ajax({
    url: "src/update_wishlist.php",
    method: "POST",
    data: {
      product_id: $product_id,
      user_id: $user_id,
    },
    success: function (response) {
      $("#badge-wishlist").load(
        "src/badge_wishlist.php",
        {
          user_id: $user_id,
        }
      );
      $("#daftar-wishlist").load(
        "src/offcanvas_wishlist.php",
        {
          user_id: $user_id,
        }
      );
    },
    error: function (xhr, status, error) {
      alert("Terjadi kesalahan: " + error);
    },
  });
}
// cart
function update_cart(
  $product_id,
  $user_id,
  $status
) {
  $.ajax({
    url: "src/update_cart.php",
    method: "POST",
    data: {
      product_id: $product_id,
      user_id: $user_id,
      status: $status,
    },
    success: function (response) {
      $("#" + $product_id + " .spinners").hide();
      if (response == "1") {
        Swal.fire({
          title: "Berhasil!",
          text: "Berhasil menambahkan produk ke keranjang!",
          icon: "info",
          confirmButtonText: "Ok",
        });
      }
      $("#badge-cart").load(
        "src/badge_cart.php",
        { user_id: $user_id }
      );
      $("#daftar-cart").load(
        "src/offcanvas_cart.php",
        { user_id: $user_id }
      );
    },
    error: function (xhr, status, error) {
      console.log("Terjadi kesalahan: " + error);
    },
  });
}
// order
function checkout(
  name,
  email,
  no_hp,
  address,
  postal_code,
  products_id_amount_list
) {
  $.ajax({
    url: "src/place_order.php",
    method: "POST",
    data: {
      name: name,
      email: email,
      no_hp: no_hp,
      address: address,
      postal_code: postal_code,
      products_id_amount_list:
        products_id_amount_list,
    },
    success: function (response) {
      let myArray = JSON.parse(response);
      window.snap.pay(myArray[1], {
        onSuccess: function (result) {
          /* You may add your own implementation here */
          Swal.fire({
            title: "Berhasil!",
            text: "Pembayaran berhasil dilakukan!",
            icon: "success",
            confirmButtonText: "Ok",
          });
          console.log(result);
        },
        onPending: function (result) {
          /* You may add your own implementation here */
          Swal.fire({
            title: "Pending!",
            text: "Pembayaran di pending!",
            icon: "warning",
            confirmButtonText: "Ok",
          });
          console.log(result);
        },
        onError: function (result) {
          /* You may add your own implementation here */
          alert("payment failed!");
          console.log(result);
        },
        onClose: function () {
          /* You may add your own implementation here */
          Swal.fire({
            title: "Batal!",
            text: "Pembayaran Anda dibatalkan!",
            icon: "warning",
            confirmButtonText: "Ok",
          });
          window.location.href = "index.php";
        },
      });
    },
    error: function (xhr, status, error) {
      console.log("Terjadi kesalahan: " + error);
    },
  });
}
// get cart
function getCartProductId() {
  const cartItems = document.querySelectorAll(
    "#daftar-cart .list-group-item"
  );
  const CartProductId = [];
  cartItems.forEach((item) => {
    const productId = item.querySelector(
      'input[name="product_id_cart"]'
    ).value;
    const totalProduct = item.querySelector(
      'input[name="total_product"]'
    ).value;
    CartProductId.push({
      productId: productId,
      amountProduct: totalProduct,
    });
  });
  return JSON.stringify(CartProductId);
}

// document ready
$(document).ready(function () {
  let user_id = $("#session-user-id").val();

  // spinners hide
  $(".spinners").hide();

  // like
  $("#badge-wishlist").load(
    "src/badge_wishlist.php",
    { user_id: user_id }
  );
  $("#daftar-wishlist").load(
    "src/offcanvas_wishlist.php",
    {
      user_id: user_id,
    }
  );

  // cart
  $("#badge-cart").load("src/badge_cart.php", {
    user_id: user_id,
  });
  $("#daftar-cart").load(
    "src/offcanvas_cart.php",
    { user_id: user_id }
  );

  // like
  $(document).on(
    "click",
    ".like-btn",
    function () {
      $("#" + this.id).toggleClass("is-active");
      update_wishlist(
        $("#" + this.id).data("product"),
        user_id
      );
    }
  );

  // cart
  $(document).on(
    "click",
    ".cart-btn",
    function () {
      $("#" + this.id + " .spinners").show();
      update_cart(this.id, user_id, 1);
    }
  );
  $(document).on(
    "click",
    ".cart-btn-plus",
    function () {
      update_cart(this.id, user_id, 2);
    }
  );
  $(document).on(
    "click",
    ".cart-btn-minus",
    function () {
      update_cart(this.id, user_id, 3);
    }
  );

  // modal
  $(document).on(
    "click",
    ".view-btn",
    function () {
      $("#modal_view_product").load(
        "src/modal_content.php",
        { id: this.id }
      );
      $("#modal_view_product").modal("show");
    }
  );
  $(document).on(
    "click",
    "#close_modal_view",
    function () {
      $("#modal_view_product").modal("hide");
    }
  );

  function validateEmail(email) {
    const emailPattern =
      /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }

  // order
  $(document).on(
    "click",
    "#check_out_btn",
    function () {
      var name = $("#name").val();
      var email = $("#email").val();
      var no_hp = $("#no_hp").val();
      var address = $("#address").val();
      var postal_code = $("#postal_code").val();
      const products_id_amount_list =
        getCartProductId();
      if (
        name.length == 0 ||
        email.length == 0 ||
        validateEmail(email) == 0 ||
        no_hp.length == 0
      ) {
        Swal.fire({
          title: "Gagal!",
          text: "Nama, Email, dan Nomor HP tidak boleh kosong! dan Email haruslah Valid",
          icon: "error",
          confirmButtonText: "Ok",
        });
      } else {
        checkout(
          name,
          email,
          no_hp,
          address,
          postal_code,
          products_id_amount_list
        );
      }
    }
  );
});

// tooltip
(function () {
  document
    .querySelectorAll(".info-tooltip")
    .forEach(function (tooltip) {
      new bootstrap.Tooltip(tooltip, {
        selector: '[data-bs-toggle="tooltip"]',
      });
    });
})();

//logout
function accept_logout(event) {
  event.preventDefault();
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah anda yakin untuk logout?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Ya!",
    cancelButtonText: "Tidak, batalkan!",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "auth/logout.php";
    }
  });
}
