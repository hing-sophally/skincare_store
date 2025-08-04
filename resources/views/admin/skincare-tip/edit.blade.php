@extends('layouts.admin_index')

@section('content')
    <div class="container pt-5">
        <div class="page-inner">
            <div class="row justify-content-start">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-gradient-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-folder-plus me-2"></i>Update Skincare Tip
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

                            <form action="{{ route('admin.skincaretips.update', $tip->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Title --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-heading me-1 text-primary"></i>Title
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="title"
                                           class="form-control form-control-lg border-2 @error('title') is-invalid @enderror"
                                           value="{{ old('title', $tip->title) }}"
                                           placeholder="Enter tip title"
                                           required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Content --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-align-left me-1 text-primary"></i>Content
                                        <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="tip_content"
                                              class="form-control border-2 @error('tip_content') is-invalid @enderror"
                                              rows="4"
                                              placeholder="Enter tip content"
                                              required>{{ old('tip_content', $tip->tip_content) }}</textarea>
                                    @error('tip_content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @endif
                                </div>

                                {{-- Author Name --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-user me-1 text-primary"></i>Author Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="author_name"
                                           class="form-control form-control-lg border-2 @error('author_name') is-invalid @enderror"
                                           value="{{ old('author_name', $tip->author_name) }}"
                                           placeholder="Enter author name"
                                           required>
                                    @error('author_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @endif
                                </div>

                                {{-- Question --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-question-circle me-1 text-primary"></i>Question
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="question"
                                           class="form-control form-control-lg border-2 @error('question') is-invalid @enderror"
                                           value="{{ old('question', $tip->question) }}"
                                           placeholder="Enter question"
                                           required>
                                    @error('question')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @endif
                                </div>

                                {{-- Date --}}
                                <div class="form-group mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-calendar-alt me-1 text-primary"></i>Date
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="date"
                                           name="date"
                                           class="form-control form-control-lg border-2 @error('date') is-invalid @enderror"
                                           value="{{ old('date', $tip->date) }}"
                                           required>
                                    @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @endif
                                </div>

                                <hr class="my-4">

                                {{-- Buttons --}}
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-text text-muted">
                                        <i class="fas fa-asterisk me-1 text-danger" style="font-size: 8px;"></i>
                                        Required fields
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.skincaretips.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                                            <i class="fas fa-times me-2"></i>Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-lg px-4 ms-2">
                                            <i class="fas fa-save me-2"></i>Update Skincare Tip
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
