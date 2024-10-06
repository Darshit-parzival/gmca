@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Education Data</h1>
    </div>
    <hr class="mb-5">
    <div class="top-actions d-flex">
        <div style="flex: 1;">
            <a href="#" class="btn btn-secondary">Export</a>
        </div>
        <div style="margin-left:auto;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Add New Education
            </button>
        </div>
    </div>
   <!-- Add Modal -->
   <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ url('/admin/education/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="degree" class="form-label">Degree</label>
                        <input type="text" class="form-control" name="degree" id="degree" maxlength="50" required>
                        <span class="text-danger mt-2">@error('degree') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="university" class="form-label">University</label>
                        <input type="text" class="form-control" name="university" id="university" maxlength="50" required>
                        <span class="text-danger mt-2">@error('university') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="percentage" class="form-label">Percentage</label>
                        <input type="number" class="form-control" name="percentage" id="percentage" step="0.01" required>
                        <span class="text-danger mt-2">@error('percentage') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="cgpa" class="form-label">CGPA</label>
                        <input type="number" class="form-control" name="cgpa" id="cgpa" step="0.01" required>
                        <span class="text-danger mt-2">@error('cgpa') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="passyear" class="form-label">Pass Year</label>
                        <input type="number" class="form-control" name="passyear" id="passyear" required>
                        <span class="text-danger mt-2">@error('passyear') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Active</label>
                        <input type="checkbox" class="form-check-input" name="status" id="status" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Education</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(!$educations->isEmpty())
<div class="table-responsive">
    <table class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
        <thead>
            <tr class="table-dark">
                <th>Id</th>
                <th>Staff ID</th>
                <th>Degree</th>
                <th>University</th>
                <th>Percentage</th>
                <th>CGPA</th>
                <th>Pass Year</th>
                <th>Status</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($educations as $i => $education)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $education->staff_id }}</td>
                <td>{{ $education->degree }}</td>
                <td>{{ $education->university }}</td>
                <td>{{ $education->percentage }}</td>
                <td>{{ $education->cgpa }}</td>
                <td>{{ $education->passyear }}</td>
                <td>
                    @if ($education->status)
                        <div class="text-success">Active</div>  
                    @else
                        <div class="text-danger">Inactive</div>  
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $education->edu_id }}">
                        Edit
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $education->edu_id }}">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Confirm Delete Modal -->
            <div class="modal fade" id="confirmDeleteModal{{ $education->edu_id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $education->edu_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this education record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="{{ url('/admin/education/delete/' . $education->edu_id) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $education->edu_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $education->edu_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $education->edu_id }}">Edit Education</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ url('/admin/education/edit') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="edu_id" value="{{ $education->edu_id }}">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="degree" class="form-label">Degree</label>
                                    <input type="text" class="form-control" name="degree" id="degree" value="{{ $education->degree }}" required>
                                    <span class="text-danger mt-2">@error('degree') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="university" class="form-label">University</label>
                                    <input type="text" class="form-control" name="university" id="university" value="{{ $education->university }}" required>
                                    <span class="text-danger mt-2">@error('university') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="percentage" class="form-label">Percentage</label>
                                    <input type="number" class="form-control" name="percentage" id="percentage" value="{{ $education->percentage }}" step="0.01" required>
                                    <span class="text-danger mt-2">@error('percentage') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="cgpa" class="form-label">CGPA</label>
                                    <input type="number" class="form-control" name="cgpa" id="cgpa" value="{{ $education->cgpa }}" step="0.01" required>
                                    <span class="text-danger mt-2">@error('cgpa') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="passyear" class="form-label">Pass Year</label>
                                    <input type="number" class="form-control" name="passyear" id="passyear" value="{{ $education->passyear }}" required>
                                    <span class="text-danger mt-2">@error('passyear') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Active</label>
                                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" {{ $education->status ? 'checked' : '' }}>
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
    <h1>No Education Records Yet!</h1>
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
