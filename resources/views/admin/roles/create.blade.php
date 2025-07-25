@extends('layouts.admin_index')

@section('content')
    <div class="container">
        <div class="page-inner pt-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-5 pb-4">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-gradient-primary text-white">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-user-shield me-2"></i>Role Information
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

                            <form action="{{ route('admin.roles.store') }}" method="POST">
                                @csrf

                                {{-- Role Name --}}
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark">
                                        <i class="fas fa-tag me-1 text-primary"></i>Role Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                           name="name"
                                           class="form-control form-control-lg border-2 @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="Enter role name"
                                           required>
                                    @error('name')
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
                                              placeholder="Enter role description (optional)">{{ old('description') }}</textarea>
                                    @error('description')
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
                                        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary btn-lg px-4">
                                            <i class="fas fa-times me-2"></i>Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary btn-lg px-4 ms-2">
                                            <i class="fas fa-save me-2"></i>Create Role
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
