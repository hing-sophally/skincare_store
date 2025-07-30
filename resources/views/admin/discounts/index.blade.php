@extends('layouts.admin_index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-5 pb-4">
                <div class="ms-md-auto py-2 py-md-0"></div>
            </div>

            <!-- Header Section -->
            <div class="row align-items-center mb-4">
                <div class="col-md-6">
                    <h3 class="fw-bold mb-1">Discount Management</h3>
                    <h6 class="text-muted">Manage your discount offers</h6>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('discounts.create') }}" class="btn btn-primary btn-round">
                        <i class="fas fa-plus-circle me-1"></i>Add Discount
                    </a>
                </div>
            </div>

            <!-- Discount Table -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <div class="card-title mb-0 fw-semibold">Discount List</div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th class="text-center" width="5%">#</th>
                                <th width="20%">Name</th>
                                <th width="20%">Product</th>
                                <th width="10%">Type</th>
                                <th width="10%">Amount</th>
                                <th width="15%">Start Date</th>
                                <th width="15%">End Date</th>
                                <th class="text-center" width="10%">Status</th>
                                <th class="text-center" width="10%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($discounts as $index => $discount)
                                <tr class="align-middle">
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td><strong class="text-dark">{{ $discount->name }}</strong></td>
                                    <td>{{ $discount->product ? $discount->product->name : '-' }}</td>
                                    <td>{{ ucfirst($discount->type) }}</td>
                                    <td>
                                        @if($discount->type == 'percent')
                                            {{ $discount->amount }}%
                                        @else
                                            ${{ number_format($discount->amount, 2) }}
                                        @endif
                                    </td>
                                    <td>{{ $discount->start_date ?? '-' }}</td>
                                    <td>{{ $discount->end_date ?? '-' }}</td>
                                    <td class="text-center">
                                        @if($discount->active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Actions">
                                            <a href="{{ route('discounts.edit', $discount->id) }}"
                                               class="btn btn-outline-primary btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" class="delete-discount-form" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm delete-btn" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <div class="empty-state">
                                            <div class="empty-icon mb-3">
                                                <i class="fas fa-tags fa-4x text-muted opacity-50"></i>
                                            </div>
                                            <h5 class="text-muted mb-2">No Discounts Found</h5>
                                            <p class="text-muted mb-4">Start by creating your first discount.</p>
                                            <a href="{{ route('discounts.create') }}" class="btn btn-primary btn-lg">
                                                <i class="fas fa-plus me-2"></i>Create Discount
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

    <!-- Include SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Attach event to all delete forms
            document.querySelectorAll('.delete-discount-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault(); // prevent immediate submit

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#651B7A',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // submit form after confirmation
                        }
                    });
                });
            });
        });
    </script>
@endsection
