@extends('layouts.index')

@section('title', 'Home - Eiser ecommerce')

@section('content')

<!-- Banner Section -->
<div class="container" style="background-color: #f3e5f5; border-radius: 12px; padding: 40px; display: flex; align-items: center; justify-content: space-between; height: 300px; margin-bottom: 20px;">

    <!-- Left Text Section -->
    <div style="flex: 1;">
        <p style="font-size: 16px; color: #651B7A; margin: 0; font-weight: 600;">Care your skin with</p>
        <h1 style="font-size: 48px; font-weight: bold; color: #651B7A; margin: 10px 0; font-family: 'Poppins', sans-serif;">Lee</h1>
        <button style="background-color: #651B7A; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer;">Get start</button>
    </div>

    <!-- Right Image Section -->
    <div class="d-none d-lg-block" style="">
        <img src="{{asset('frontend/assets/img/banner.png')}}" alt="Skin Care Step 1" >

    </div>
    <div class="d-block d-lg-none" >
        <img src="{{asset('frontend/assets/img/banner-small.png')}}" alt="Skin Care Step 1"  style="width: 200px">
    </div>

</div>

@include('frontend.products.index')
@endsection
