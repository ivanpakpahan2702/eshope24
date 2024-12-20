<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand"><strong>Eshope<span class="logo-24">24</span></strong></a>
        <div class="d-flex mt-1">
            <!-- Wishlist -->
            <button
                type="button"
                class="btn btn-warning position-relative me-3"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWishlist"
                aria-controls="offcanvasExample">
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
                <!-- Badge Wishlist -->
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                    id="badge-wishlist">
                    0
                    <span class="visually-hidden">wishlist</span>
                </span>
            </button>
            <!-- Cart -->
            <button
                type="button"
                class="btn btn-primary position-relative"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasCart"
                aria-controls="offcanvasExample">
                <i class="bi bi-cart"></i>
                <!-- Badge Cart -->
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                    id="badge-cart">
                    0
                    <span class="visually-hidden">cart</span>
                </span>
            </button>
        </div>
    </div>
</nav>