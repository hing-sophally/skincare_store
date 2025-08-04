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
                    <h3 class="fw-bold mb-1">Skincare Tip Management</h3>
                    <h6 class="text-muted">Manage skincare tips</h6>
                </div>
                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('admin.skincaretips.create') }}" class="btn btn-primary btn-round">
                        <i class="fas fa-plus-circle me-1"></i>Add Skincare Tip
                    </a>
                </div>
            </div>

            <!-- Skincare Tips Table -->
            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <div class="card-title mb-0 fw-semibold">Skincare Tips List</div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                            <tr>
                                <th class="text-center border-0" width="5%">#</th>
                                <th class="border-0" width="15%">Title</th>
                                <th class="border-0" width="20%">Content</th>
                                <th class="border-0" width="15%">Author</th>
                                <th class="border-0" width="10%">Question</th>
                                <th class="text-center border-0" width="10%">Date</th>
                                <th class="text-center border-0" width="10%">Created</th>
                                <th class="text-center border-0" width="10%">Updated</th>
                                <th class="text-center border-0" width="10%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tips as $index => $tip)
                                <tr class="align-middle">
                                    <td class="text-center">
                                        <span class="badge bg-light text-dark">{{ $index + 1 }}</span>
                                    </td>
                                    <td>
                                        <strong class="text-dark">{{ $tip->title }}</strong>
                                    </td>
                                    <td>
                                        <span class="text-muted small">{{ Str::limit($tip->tip_content, 60) }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted small">{{ $tip->author_name }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted small">{{ $tip->question }}</span>
                                    </td>
                                    <td class="text-center">
                                        <small class="text-muted">{{ $tip->date ? (is_string($tip->date) ? Carbon::parse($tip->date)->format('M d, Y') : $tip->date->format('M d, Y')) : '' }}</small>                                    </td>
                                    <td class="text-center">
                                        <small class="text-muted">{{ $tip->created_at->format('M d, Y') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <small class="text-muted">{{ $tip->updated_at->format('M d, Y') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.skincaretips.edit', $tip->id) }}"
                                               class="btn btn-outline-primary btn-sm"
                                               title="Edit tip">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-outline-danger btn-sm btn-delete-tip"
                                                    data-id="{{ $tip->id }}"
                                                    data-name="{{ $tip->title }}"
                                                    data-url="{{ route('admin.skincaretips.destroy', $tip->id) }}"
                                                    title="Delete tip">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-5">
                                        <div class="empty-state">
                                            <div class="empty-icon mb-3">
                                                <i class="fas fa-user-shield fa-4x text-muted opacity-50"></i>
                                            </div>
                                            <h5 class="text-muted mb-2">No Skincare Tips Found</h5>
                                            <p class="text-muted mb-4">Start by creating your first skincare tip to manage advice.</p>
                                            <a href="{{ route('admin.skincaretips.create') }}" class="btn btn-primary btn-lg">
                                                <i class="fas fa-plus me-2"></i>Create First Skincare Tip
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
            const deleteButtons = document.querySelectorAll('.btn-delete-tip');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const tipId = this.dataset.id;
                    const tipName = this.dataset.name;
                    const deleteUrl = this.dataset.url;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to delete skincare tip: "${tipName}"`,
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
    .card { border: none; border-radius: 12px; overflow: hidden; }
    .card-header { border-bottom: 1px solid rgba(0,0,0,0.1); padding: 1.25rem 1.5rem; }
    .table th { font-weight: 600; font-size: 0.875rem; padding: 1rem 0.75rem; color: #fff; }
    .table td { padding: 1rem 0.75rem; border-top: 1px solid #f1f3f4; vertical-align: middle; }
    .table tbody tr:hover { background-color: #f8f9fa; transition: background-color 0.15s ease; }
    .btn-group-sm .btn { padding: 0.375rem 0.5rem; margin: 0 2px; border-radius: 6px; }
    .btn-outline-primary:hover, .btn-outline-danger:hover { transform: translateY(-1px); transition: all 0.2s ease; }
    .empty-state { padding: 3rem 2rem; }
    .empty-icon { animation: float 3s ease-in-out infinite; }
    @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
    .badge { font-size: 0.75rem; padding: 0.375rem 0.5rem; }
    .shadow-sm { box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important; }
    .btn { transition: all 0.2s ease; }
    .btn:hover { transform: translateY(-1px); }
    .btn-primary { background: linear-gradient(45deg, #007bff, #0056b3); border: none; }
    .btn-primary:hover { background: linear-gradient(45deg, #0056b3, #004085); }
    @media (max-width: 768px) {
        .table-responsive { border-radius: 0; }
        .btn-group-sm .btn { padding: 0.25rem 0.375rem; font-size: 0.75rem; }
        .empty-state { padding: 2rem 1rem; }
    }
    .swal-modern { border-radius: 15px !important; box-shadow: 0 10px 40px rgba(0,0,0,0.1) !important; }
    .page-inner { padding-left: 1rem; padding-right: 1rem; overflow-x: hidden; }
    @media (min-width: 992px) { .page-inner { padding-left: 1.5rem; padding-right: 1.5rem; } }
</style>
