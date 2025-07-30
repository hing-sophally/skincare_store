@extends('layouts.admin_index')

@section('content')
    <div class="container">
        <div class="page-inner pt-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-5 pb-4">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-gradient-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-percentage me-2"></i>Discount Information
                            </h5>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger border-0 shadow-sm mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        <strong>Please fix the following errors:</strong>
                                    </div>
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('discounts.store') }}" method="POST">
                                @csrf

                                {{-- Discount Name --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-tag me-1 text-primary"></i>Discount Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="name"
                                           class="form-control form-control-lg border-2 @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="Enter discount name"
                                           required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Discount Type --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-exchange-alt me-1 text-primary"></i>Discount Type
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="type" class="form-select border-2 @error('type') is-invalid @enderror" required>
                                        <option value="">-- Select Discount Type --</option>
                                        <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                        <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Percent</option>
                                    </select>
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Amount --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-dollar-sign me-1 text-primary"></i>Amount
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" step="0.01"
                                           name="amount"
                                           class="form-control border-2 @error('amount') is-invalid @enderror"
                                           value="{{ old('amount') }}"
                                           placeholder="Enter discount amount"
                                           required>
                                    @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Product --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-box me-1 text-primary"></i>Product
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="product_id" class="form-select border-2 @error('product_id') is-invalid @enderror" required>
                                        <option value="">-- Select Product --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Start Date --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-calendar-alt me-1 text-primary"></i>Start Date
                                    </label>
                                    <input type="date"
                                           name="start_date"
                                           class="form-control border-2 @error('start_date') is-invalid @enderror"
                                           value="{{ old('start_date') }}">
                                    @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- End Date --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-calendar-check me-1 text-primary"></i>End Date
                                    </label>
                                    <input type="date"
                                           name="end_date"
                                           class="form-control border-2 @error('end_date') is-invalid @enderror"
                                           value="{{ old('end_date') }}">
                                    @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Active Status --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-toggle-on me-1 text-primary"></i>Active
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="active" class="form-select border-2 @error('active') is-invalid @enderror" required>
                                        <option value="1" {{ old('active') == '1' ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr class="my-4">

                                {{-- Submit & Cancel --}}
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-text text-muted">
                                        <i class="fas fa-asterisk me-1 text-danger" style="font-size: 8px;"></i>
                                        Required fields
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('discounts.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                                            <i class="fas fa-times me-2"></i>Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-lg px-4 ms-2">
                                            <i class="fas fa-save me-2"></i>Create Discount
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
