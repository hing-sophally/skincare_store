@extends('layouts.admin_index')

@section('content')
    <div class="container">
        <div class="page-inner pt-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-5 pb-4">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-gradient-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-box-open me-2"></i>Product Information
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

                            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- Product Name --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-tag me-1 text-primary"></i>Product Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="name"
                                           class="form-control form-control-lg border-2 @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="Enter product name"
                                           required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-list-alt me-1 text-primary"></i>Category
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="category_id" class="form-select border-2 @error('category_id') is-invalid @enderror" required>
                                        <option value="">-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-align-left me-1 text-primary"></i>Description
                                    </label>
                                    <textarea name="description"
                                              class="form-control border-2 @error('description') is-invalid @enderror"
                                              rows="4"
                                              placeholder="Enter product description (optional)">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Price --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-dollar-sign me-1 text-primary"></i>Price
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                           name="price"
                                           class="form-control border-2 @error('price') is-invalid @enderror"
                                           value="{{ old('price') }}"
                                           placeholder="Enter price"
                                           min="0"
                                           step="0.01"
                                           required>
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-toggle-on me-1 text-primary"></i>Status
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="status" class="form-select border-2 @error('status') is-invalid @enderror" required>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Image Upload --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-image me-1 text-primary"></i>Product Image
                                    </label>
                                    <div class="input-group">
                                        <input type="file"
                                               name="image"
                                               class="form-control border-2 @error('image') is-invalid @enderror"
                                               accept="image/*"
                                               id="imageInput">
                                        <label class="input-group-text border-2" for="imageInput">
                                            <i class="fas fa-upload"></i>
                                        </label>
                                    </div>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Supported formats: JPG, PNG, GIF. Max size: 2MB
                                    </small>

                                    <div id="imagePreview" class="mt-3" style="display: none;">
                                        <div class="card border-light shadow-sm" style="max-width: 200px;">
                                            <img id="previewImg" src="" class="card-img-top rounded" style="height: 150px; object-fit: cover;">
                                            <div class="card-body p-2 text-center">
                                                <small class="text-muted">Preview</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                {{-- Submit & Cancel --}}
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-text text-muted">
                                        <i class="fas fa-asterisk me-1 text-danger" style="font-size: 8px;"></i>
                                        Required fields
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.product') }}" class="btn btn-outline-secondary btn-lg px-4">
                                            <i class="fas fa-times me-2"></i>Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-lg px-4 ms-2">
                                            <i class="fas fa-save me-2"></i>Create Product
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

    {{-- JS Image Preview --}}
    <script>
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('imagePreview');
            const previewImg = document.getElementById('previewImg');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    </script>
@endsection
