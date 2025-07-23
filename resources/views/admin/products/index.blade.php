@extends('layouts.admin_index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-5 pb-4">

                <div class="ms-md-auto py-2 py-md-0">
{{--                    <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>--}}
{{--                    <a href="#" class="btn btn-primary btn-round">Add Customer</a>--}}
                </div>
            </div>

            <!-- Header Section -->
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-1">product Management</h3>
                    <h6 class="text-muted">Manage your product categories</h6>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-round">
                        <i class="fas fa-plus-circle me-1"></i>Add product
                    </a>
                </div>
            </div>

            <!-- Categories Table -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <div class="card-title mb-0 fw-semibold">Categories List</div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th class="text-center border-0" width="5%">#</th>
                                <th class="border-0" width="15%">Name</th>
                                <th class="border-0" width="15%">Category</th> {{-- Added --}}
                                <th class="border-0" width="25%">Description</th>
                                <th class="text-center border-0" width="10%">Image</th>
                                <th class="text-center border-0" width="8%">Price</th> {{-- Optional: show price --}}
                                <th class="text-center border-0" width="8%">Status</th> {{-- Added --}}
                                <th class="text-center border-0" width="10%">Created</th>
                                <th class="text-center border-0" width="10%">Updated</th>
                                <th class="text-center border-0" width="9%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $index => $product)
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark">{{ $index + 1 }}</span>
                                    </td>
                                    <td>
                                        <strong class="text-dark">{{ $product->name }}</strong>
                                    </td>
                                    <td>
                                        {{ $product->category ? $product->category->name : '-' }}
                                    </td>
                                    <td>
                                        <span class="text-muted small">{{ Str::limit($product->description, 60) }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if($product->image_url)
                                            <div class="avatar avatar-sm">
                                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="avatar-img rounded-circle">
                                            </div>
                                        @else
                                            <div class="avatar avatar-sm bg-secondary">
                                                <span class="avatar-title rounded-circle"><i class="fas fa-image"></i></span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        ${{ number_format($product->price, 2) }}
                                    </td>
                                    <td class="text-center">
                                        @if($product->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <small class="text-muted">{{ $product->created_at->format('M d, Y') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <small class="text-muted">{{ $product->updated_at->format('M d, Y') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.product.edit', $product->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="Edit product">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-outline-danger btn-sm btn-delete-product"
                                                    data-id="{{ $product->id }}"
                                                    data-name="{{ $product->name }}"
                                                    data-url="{{ route('admin.product.delete', $product->id) }}"
                                                    title="Delete product">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center py-5">
                                        <div class="empty-state">
                                            <div class="empty-icon mb-3">
                                                <i class="fas fa-box-open fa-4x text-muted opacity-50"></i>
                                            </div>
                                            <h5 class="text-muted mb-2">No Products Found</h5>
                                            <p class="text-muted mb-4">Start by creating your first product to organize your store.</p>
                                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-lg">
                                                <i class="fas fa-plus me-2"></i>Create First Product
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.btn-delete-product');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.dataset.id;
                    const productName = this.dataset.name;
                    const deleteUrl = this.dataset.url;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to delete product: "${productName}"`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        customClass: {
                            popup: 'swal-modern'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = deleteUrl;

                            const csrf = document.createElement('input');
                            csrf.type = 'hidden';
                            csrf.name = '_token';
                            csrf.value = '{{ csrf_token() }}';

                            const method = document.createElement('input');
                            method.type = 'hidden';
                            method.name = '_method';
                            method.value = 'DELETE';

                            form.appendChild(csrf);
                            form.appendChild(method);
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

<style>
    .card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }

    .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.1);
        padding: 1.25rem 1.5rem;
    }

    .table th {
        font-weight: 600;
        font-size: 0.875rem;
        padding: 1rem 0.75rem;
        color: #fff;
    }

    .table td {
        padding: 1rem 0.75rem;
        border-top: 1px solid #f1f3f4;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.15s ease;
    }

    .btn-group-sm .btn {
        padding: 0.375rem 0.5rem;
        margin: 0 2px;
        border-radius: 6px;
    }

    .btn-outline-primary:hover,
    .btn-outline-danger:hover {
        transform: translateY(-1px);
        transition: all 0.2s ease;
    }

    .avatar {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .avatar-title {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
        color: #fff;
    }

    .empty-state {
        padding: 3rem 2rem;
    }

    .empty-icon {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .badge {
        font-size: 0.75rem;
        padding: 0.375rem 0.5rem;
    }

    .shadow-sm {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
    }

    .btn {
        transition: all 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-1px);
    }

    .btn-primary {
        background: linear-gradient(45deg, #007bff, #0056b3);
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #0056b3, #004085);
    }

    @media (max-width: 768px) {
        .table-responsive {
            border-radius: 0;
        }

        .btn-group-sm .btn {
            padding: 0.25rem 0.375rem;
            font-size: 0.75rem;
        }

        .empty-state {
            padding: 2rem 1rem;
        }
    }

    /* SweetAlert Styling */
    .swal-modern {
        border-radius: 15px !important;
        box-shadow: 0 10px 40px rgba(0,0,0,0.1) !important;
    }

    /* Prevent horizontal overflow */
    .page-inner {
        padding-left: 1rem;
        padding-right: 1rem;
        overflow-x: hidden;
    }

    @media (min-width: 992px) {
        .page-inner {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
    }
</style>
