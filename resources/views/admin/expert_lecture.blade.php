@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Expert Lecture Data</h1>
    </div>
    <hr class="mb-5">
    <div class="top-actions d-flex">
        <div style="flex: 1;">
            <button id="exportButton" class="btn btn-secondary">Export</button>
        </div>
        <div style="margin-left:auto;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Add New Expert Lecture
            </button>
        </div>
    </div>
    
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Expert Lecture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ url('/admin/expert-lecture/add') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" maxlength="30" required>
                            <span class="text-danger mt-2">@error('title') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control" name="details" id="details" required></textarea>
                            <span class="text-danger mt-2">@error('details') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" id="location" maxlength="40" required>
                            <span class="text-danger mt-2">@error('location') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Active</label>
                            <input type="checkbox" class="form-check-input" name="status" id="status" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Expert Lecture</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(!$lectures->isEmpty())
    <div class="table-responsive">
        <table id="pagetable" class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
            <thead>
                <tr class="table-dark">
                    <th>Id</th>
                    <th>Staff ID</th>
                    <th>Title</th>
                    <th>Details</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lectures as $i => $lecture)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $lecture->staff_id }}</td>
                    <td>{{ $lecture->title }}</td>
                    <td>{{ $lecture->details }}</td>
                    <td>{{ $lecture->location }}</td>
                    <td>
                        @if ($lecture->status)
                            <div class="text-success">Active</div>  
                        @else
                            <div class="text-danger">Inactive</div>  
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                        <button type="button" class="me-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $lecture->el_id }}">
                            Edit
                        </button>
                    
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $lecture->el_id }}">
                            Delete
                        </button>
                        </div>
                    </td>
                </tr>

                <!-- Confirm Delete Modal -->
                <div class="modal fade" id="confirmDeleteModal{{ $lecture->el_id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $lecture->el_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this expert lecture record?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ url('/admin/expert-lecture/delete/' . $lecture->el_id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $lecture->el_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $lecture->el_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $lecture->el_id }}">Edit Expert Lecture</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ url('/admin/expert-lecture/edit') }}">
                                @csrf
                                <input type="hidden" name="el_id" value="{{ $lecture->el_id }}">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{ $lecture->title }}" required>
                                        <span class="text-danger mt-2">@error('title') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="details" class="form-label">Details</label>
                                        <textarea class="form-control" name="details" id="details" required>{{ $lecture->details }}</textarea>
                                        <span class="text-danger mt-2">@error('details') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location" id="location" value="{{ $lecture->location }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Active</label>
                                        <input type="checkbox" class="form-check-input" name="status" id="status" value="1" {{ $lecture->status ? 'checked' : '' }}>
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
        <h1>No Expert Lecture Records Yet!</h1>
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
