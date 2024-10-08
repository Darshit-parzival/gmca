@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Experience Data</h1>
    </div>
    <hr class="mb-5">
    <div class="top-actions d-flex">
        <div style="flex: 1;">
            <a href="#" class="btn btn-secondary">Export</a>
        </div>
        <div style="margin-left:auto;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Add New Experience
            </button>
        </div>
    </div>
   <!-- Add Modal -->
   <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ url('/admin/experience/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" name="designation" id="designation" maxlength="30" required>
                        <span class="text-danger mt-2">@error('designation') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="from" class="form-label">From (Year)</label>
                        <input type="number" class="form-control" name="from" id="from" required>
                        <span class="text-danger mt-2">@error('from') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="to" class="form-label">To (Year)</label>
                        <input type="number" class="form-control" name="to" id="to" required>
                        <span class="text-danger mt-2">@error('to') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="organization" class="form-label">Organization</label>
                        <input type="text" class="form-control" name="organization" id="organization" maxlength="50" required>
                        <span class="text-danger mt-2">@error('organization') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Active</label>
                        <input type="checkbox" class="form-check-input" name="status" id="status" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Experience</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(!$experiences->isEmpty())
<div class="table-responsive">
    <table id="pagetable" class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
        <thead>
            <tr class="table-dark">
                <th>Id</th>
                <th>Staff ID</th>
                <th>Designation</th>
                <th>From</th>
                <th>To</th>
                <th>Organization</th>
                <th>Status</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $i => $experience)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $experience->staff_id }}</td>
                <td>{{ $experience->designation }}</td>
                <td>{{ $experience->from }}</td>
                <td>{{ $experience->to }}</td>
                <td>{{ $experience->organization }}</td>
                <td>
                    @if ($experience->status)
                        <div class="text-success">Active</div>  
                    @else
                        <div class="text-danger">Inactive</div>  
                    @endif
                </td>
                <div class="d-flex justify-content-center">
                <td>
                    <button type="button" class="me-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $experience->exp_id }}">
                        Edit
                    </button>
                
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $experience->exp_id }}">
                        Delete
                    </button>
                </td>
                </div>
            </tr>

            <!-- Confirm Delete Modal -->
            <div class="modal fade" id="confirmDeleteModal{{ $experience->exp_id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $experience->exp_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this experience record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="{{ url('/admin/experience/delete/' . $experience->exp_id) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $experience->exp_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $experience->exp_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $experience->exp_id }}">Edit Experience</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ url('/admin/experience/edit') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="exp_id" value="{{ $experience->exp_id }}">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" id="designation" value="{{ $experience->designation }}" required>
                                    <span class="text-danger mt-2">@error('designation') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="from" class="form-label">From (Year)</label>
                                    <input type="number" class="form-control" name="from" id="from" value="{{ $experience->from }}" required>
                                    <span class="text-danger mt-2">@error('from') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="to" class="form-label">To (Year)</label>
                                    <input type="number" class="form-control" name="to" id="to" value="{{ $experience->to }}" required>
                                    <span class="text-danger mt-2">@error('to') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="organization" class="form-label">Organization</label>
                                    <input type="text" class="form-control" name="organization" id="organization" value="{{ $experience->organization }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Active</label>
                                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" {{ $experience->status ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="p-5 m-5 text-center">
    <h1>No Experience Records Yet!</h1>
</div>
@endif

<div class="mt-4">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</div>
</div>

@endsection
