@extends('admin.layouts.main')

@section('main-section')
<div class="container p-5">
    <div>
        <h1>Training Data</h1>
    </div>
    <hr class="mb-5">
    <div class="top-actions d-flex">
        <div style="flex: 1;">
            <a href="#" class="btn btn-secondary">Export</a>
        </div>
        <div style="margin-left:auto;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Add New Training
            </button>
        </div>
    </div>

   <!-- Add Modal -->
   <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="addModalLabel">Add Training</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form method="post" action="{{ url('/admin/training/add') }}">
                   @csrf
                   <div class="modal-body">
                       <div class="mb-3">
                           <label for="title" class="form-label">Title</label>
                           <input type="text" class="form-control" name="title" id="title" maxlength="30" required>
                           <span class="text-danger mt-2">@error('title') {{ $message }} @enderror</span>
                       </div>
                       <div class="mb-3">
                           <label for="organizer" class="form-label">Organizer</label>
                           <input type="text" class="form-control" name="organizer" id="organizer" maxlength="30" required>
                           <span class="text-danger mt-2">@error('organizer') {{ $message }} @enderror</span>
                       </div>
                       <div class="mb-3">
                           <label for="duration" class="form-label">Duration (in months)</label>
                           <input type="number" class="form-control" name="duration" id="duration" min="1" required>
                           <span class="text-danger mt-2">@error('duration') {{ $message }} @enderror</span>
                       </div>
                       <div class="mb-3">
                           <label for="status" class="form-label">Active</label>
                           <input type="checkbox" class="form-check-input" name="status" id="status" value="1" checked>
                       </div>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                       <button type="submit" class="btn btn-primary">Add Training</button>
                   </div>
               </form>
           </div>
       </div>
   </div>

@if(!$trainings->isEmpty())
<div class="table-responsive">
    <table class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
        <thead>
            <tr class="table-dark">
                <th>ID</th>
                <th>Staff ID</th>
                <th>Title</th>
                <th>Organizer</th>
                <th>Duration (months)</th>
                <th>Status</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainings as $i => $training)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $training->staff_id }}</td>
                <td>{{ $training->title }}</td>
                <td>{{ $training->organizer }}</td>
                <td>{{ $training->duration }}</td>
                <td>
                    @if ($training->status)
                        <div class="text-success">Active</div>
                    @else
                        <div class="text-danger">Inactive</div>
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $training->training_id }}">
                        Edit
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $training->training_id }}">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Confirm Delete Modal -->
            <div class="modal fade" id="confirmDeleteModal{{ $training->training_id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $training->training_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this training record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="{{ url('/admin/training/delete/' . $training->training_id) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $training->training_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $training->training_id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $training->training_id }}">Edit Training</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ url('/admin/training/edit') }}">
                            @csrf
                            <input type="hidden" name="training_id" value="{{ $training->training_id }}">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $training->title }}" maxlength="30" required>
                                    <span class="text-danger mt-2">@error('title') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="organizer" class="form-label">Organizer</label>
                                    <input type="text" class="form-control" name="organizer" id="organizer" value="{{ $training->organizer }}" maxlength="30" required>
                                    <span class="text-danger mt-2">@error('organizer') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Duration (in months)</label>
                                    <input type="number" class="form-control" name="duration" id="duration" value="{{ $training->duration }}" min="1" required>
                                    <span class="text-danger mt-2">@error('duration') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Active</label>
                                    <input type="checkbox" class="form-check-input" name="status" id="status" value="1" {{ $training->status ? 'checked' : '' }}>
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
    <h1>No Training Records Yet!</h1>
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
