@extends('layouts.index')

@section('content')
<style>
    
    .about-section h2 {
        color: #6a1b9a;
        font-weight: bold;
        font-size: 2rem;
        margin: 0;
    }

    .about-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 40px;
        padding: 0 20px;
        text-align: center;
    }

    .about-image img {
        width: 250px;
        max-width: 100%;
    }

    .about-text {
        max-width: 600px;
        color: #5e548e;
        font-size: 1rem;
        line-height: 1.6;
        text-align: center;
        text-align: justify ;
    }

    .about-text strong {
        font-weight: bold;
    }

    @media(max-width: 768px) {
        .about-content {
            flex-direction: column;
        }
    }
    .about-section {
    background: #f2e3f7;
    padding: 40px 20px;
    text-align: center;
    border-radius: 20px;
    margin-bottom: 40px;
    height: 250px;
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>

<div class="about-section container">
    <h2>About Us</h2>
</div>

<div class="about-content">
    <div class="about-image">
        <img src="{{ asset('frontend/assets/img/skincare.png') }}" alt="Skincare Products">
    </div>
    <div class="about-text">
        <p>
            At <strong>Lee Store</strong>, we believe that skincare is more than a routine — it's a ritual of self-love and confidence.
            Our mission is to empower you to feel radiant in your own skin by offering high-quality, effective, and gentle skincare products designed for all skin types.
        </p>
        <p>
            Founded with a passion for natural beauty and modern skin science, we carefully select every ingredient to nourish, protect, and rejuvenate your skin.
            From soothing cleansers to revitalizing serums, each product is crafted with care to deliver visible, lasting results.
        </p>
        <p>
            Whether you're starting your skincare journey or enhancing your existing routine, we’re here to guide and support you every step of the way.
            Because when your skin feels good, you feel unstoppable.
        </p>
        <p><strong>Glow naturally, care endlessly — with Lee Store.</strong></p>
    </div>
</div>
@endsection
