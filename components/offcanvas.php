<!-- Offcanvas Wishlists -->
<div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasWishlist"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">wishlist</h5>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        Daftar wishlists
        <hr>
        <br />
        <div id="daftar-wishlist">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="card">
                        <img
                            src="assets/products/apel1.jpg"
                            class="card-img-top"
                            alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Apel Merah</h5>
                            <p class="card-text">
                                <hr />
                                <small><strong>Rp.10.000,00</strong></small>
                            </p>
                            <button
                                id="1"
                                class="btn btn-info bi bi-eye view-btn"></button>
                            <button
                                id="1"
                                class="btn btn-success bi bi-cart-plus-fill cart-btn"></button>
                            <button
                                id="1"
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
            </ul>
        </div>
    </div>
</div>
<!-- Offcanvas Cart -->
<div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasCart"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            Keranjang Belanja
        </h5>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">Daftar barang</div>
</div>