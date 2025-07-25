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
</style>
<body>

    @include('frontend.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.footer')

    @include('frontend.scripts')

</body>
</html>
