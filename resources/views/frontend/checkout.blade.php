@extends('layouts.index')

@section('title', 'Checkout')

@section('content')
    <div class="container mt-5">
        <h2>Checkout Page</h2>

        <!-- Your cart summary goes here -->

        <!-- PayPal Button -->
        <div id="paypal-button-container"></div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id={{ $paypalClientId }}&currency=USD"></script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '20.00' // Replace with your actual total
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Redirect to payment success page
                    window.location.href = "{{ route('payment.success') }}";
                });
            }

        }).render('#paypal-button-container');
    </script>
@endsection
