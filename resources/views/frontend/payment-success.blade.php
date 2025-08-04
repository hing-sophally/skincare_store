@extends('layouts.index')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light" style="margin: 50px">
        <div class="bg-white shadow p-4 rounded text-center" style="max-width: 400px; width: 100%;">
            <div class="mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h4 class="fw-bold">Payment Successful</h4>
            <p class="text-muted">Thank you for your payment. Your order is being processed.</p>

            <div class="text-start mt-4" style="font-size: 14px;">
                <p class="d-flex justify-content-between mb-2">
                    <span>Amount Paid:</span> <span class="fw-semibold">$20.00</span>
                </p>
                <p class="d-flex justify-content-between mb-2">
                    <span>Payment Method:</span> <span>Visa ending in 1234</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Date & Time:</span> <span>April 18, 2024 at 3:45 PM</span>
                </p>
            </div>

            <a href="#" class="btn btn-dark mt-4">View Order History</a>
        </div>
    </div>
@endsection
