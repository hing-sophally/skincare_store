@extends('layouts.admin_index') {{-- Change this if your layout file is different --}}

@section('content')
    <div class="container">
        <div class="page-inner pt-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-5 pb-4">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-gradient-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-folder-plus me-2"></i>Category Information
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

                            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <label class="form-label fw-semibold text-dark">
                                                <i class="fas fa-tag me-1 text-primary"></i>Category Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control form-control-lg border-2 @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}"
                                                   placeholder="Enter category name"
                                                   required>
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <label class="form-label fw-semibold text-dark">
                                                <i class="fas fa-align-left me-1 text-primary"></i>Description
                                            </label>
                                            <textarea name="description"
                                                      class="form-control border-2 @error('description') is-invalid @enderror"
                                                      rows="4"
                                                      placeholder="Enter category description (optional)">{{ old('description') }}</textarea>
                                            @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">
                                                <i class="fas fa-info-circle me-1"></i>
                                                Provide a brief description to help identify this category
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <label class="form-label fw-semibold text-dark">
                                                <i class="fas fa-image me-1 text-primary"></i>Category Image
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
                                                <i class="fas fa-info-circle me-1"></i>
                                                Supported formats: JPG, PNG, GIF. Max size: 2MB
                                            </small>

                                            <!-- Image Preview -->
                                            <div id="imagePreview" class="mt-3" style="display: none;">
                                                <div class="card border-light shadow-sm" style="max-width: 200px;">
                                                    <img id="previewImg" src="" class="card-img-top rounded" style="height: 150px; object-fit: cover;">
                                                    <div class="card-body p-2 text-center">
                                                        <small class="text-muted">Preview</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-text text-muted">
                                        <i class="fas fa-asterisk me-1 text-danger" style="font-size: 8px;"></i>
                                        Required fields
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.category') }}" class="btn btn-outline-secondary btn-lg px-4">
                                            <i class="fas fa-times me-2"></i>Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-lg px-4 ms-2">
                                            <i class="fas fa-save me-2"></i>Create Category
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

    <script>
        // Image preview functionality
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
