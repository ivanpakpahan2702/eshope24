let wishlistCount = 0;
let wishlistArray = [];
function toggleWishlist(data) {
  var text = "";
  var index;
  document.getElementById(data.id).classList.toggle("is-active");
  // var nama_poduk = document.getElementById(data.id).parentNode.childNodes[1].innerHTML;
  let kode_produk = data.id;
  let nama_poduk = data.dataset.name;
  let harga_poduk = data.dataset.price;
  if (document.getElementById(data.id).classList.contains("is-active")) {
    wishlistCount += 1;
    wishlistArray.push([kode_produk, nama_poduk, harga_poduk]);
  } else {
    wishlistCount -= 1;
    for (var k = 0; k < wishlistArray.length; k++) {
      if (wishlistArray[k][1] == nama_poduk) {
        index = k;
      }
    }
    wishlistArray.splice(index, 1);
  }
  if (wishlistArray.length > 0) {
    wishlistArray.forEach((element) => {
      text +=
        "<li class='list-group-item list-group-item-action list-group-item-danger'>" +
        element[1] +
        "</br> <p><strong> Rp." +
        element[2] +
        "</strong></p>" +
        "<button id='" +
        element[0] +
        "' class='btn btn-light is-active' data-name='" +
        element[1] +
        "' data-price='" +
        element[2] +
        "'onclick='toggleWishlist(this)' > <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-heart-fill' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314'/></svg></button>" +
        "</li>";
    });
    document.getElementById("daftar-wishlist").innerHTML =
      "<ul class='list-group'>" + text + "</ul>";
  } else {
    document.getElementById("daftar-wishlist").innerHTML =
      "<strong>Belum ada daftar</strong>";
  }
  console.log(wishlistArray);
  document.getElementById("badge-wishlist").innerHTML = wishlistCount;
}

function addCart(data) {}
