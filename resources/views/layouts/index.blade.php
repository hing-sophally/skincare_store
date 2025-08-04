<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('frontend/assets/img/favicon.png') }}" type="image/png" />
    <title>@yield('title', 'Eiser ecommerce')</title>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}" />
    <!-- ... your other CSS links ... -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<style>
    .header_area .navbar .nav .nav-item .nav-link{
        color: #651B7A !important;
        font-weight: bold
    }
    .footer-area{
        color: violet !important;
    }
    /* Cart panel */
    #cart-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 30vw;
        max-width: 400px;
        height: 100vh;
        background: #fff;
        box-shadow: -4px 0 8px rgba(0,0,0,0.1);
        padding: 20px;
        box-sizing: border-box;
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
        overflow-y: auto;
        z-index: 1001;
    }

    /* Show cart panel */
    #cart-panel.active {
        transform: translateX(0);
    }

    /* Cart overlay (blur background) */
    #cart-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.3);
        backdrop-filter: blur(5px);
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease-in-out;
        z-index: 1000;
    }

    #cart-overlay.active {
        opacity: 1;
        pointer-events: all;
    }

    /* Prevent body scroll when cart open */
    body.cart-open {
        overflow: hidden;
    }

    /* Cart item styles */
    .cart-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }

    .cart-item img {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        margin-right: 12px;
        object-fit: cover;
    }

    .cart-details {
        flex-grow: 1;
    }

    .cart-details h4 {
        margin: 0 0 5px;
        color: #651B7A;
    }

    .price {
        color: #651B7A;
        font-weight: 600;
    }

    .qty-controls {
        margin-top: 5px;
    }

    .qty-btn {
        padding: 2px 6px;
        margin: 0 4px;
        cursor: pointer;
        background: #651B7A;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        font-size: 14px;
    }

    .delete-btn {
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: #ff4d4d;
        margin-left: 8px;
    }

    .cart-summary p {
        margin: 10px 0;
        font-weight: 600;
        color: #651B7A;
    }

    #apply-discount {
        background: #651B7A;
        color: #fff;
        border: none;
        padding: 8px 14px;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 600;
        width: 100%;
        margin-top: 15px;
    }

    #apply-discount:hover {
        background: #4e125c;
    }


</style>
<body>

    @include('frontend.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.footer')

    @include('frontend.scripts')

    <!-- Cart Overlay -->
    <div id="cart-overlay" class="cart-overlay"></div>

    <!-- Cart Panel -->
    <div id="cart-panel" class="cart-panel">
        <h3 style="color: #651B7A;">My Cart</h3>

        <!-- Items -->
        <div id="cart-items-list"></div>

        <!-- Totals -->
        <div class="mt-4 p-3 border rounded" style="font-size: 14px; background-color: #f9f9f9;">
            <p class="mb-2 d-flex justify-content-between">
                <span>Subtotal:</span>
                <span id="subtotal" class="fw-semibold text-dark">$0.00</span>
            </p>
            <p class="mb-2 d-flex justify-content-between">
                <span>Discount:</span>
                <span id="discount" class="fw-semibold text-success">-$0.00</span>
            </p>
            <hr class="my-2">
            <h5 class="d-flex justify-content-between">
                <span>Total:</span>
                <span id="total" class="fw-bold text-primary">$0.00</span>
            </h5>

            <a href="{{ route('checkout') }}" class="btn btn-warning w-100 mt-3 fw-bold">
                Proceed to Checkout
            </a>
        </div>

    </div>





</body>
</html>
