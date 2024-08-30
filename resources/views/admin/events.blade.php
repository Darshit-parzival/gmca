@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Events</h1>
    </div>
    <hr class="mb-5">
    <div class="top-actions d-flex">
        <div style="flex: 1;">
            <a href="#" class="btn btn-secondary">Export</a>
        </div>
        <div style="margin-left:auto;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Add New
            </button>
        </div>
    </div>
   <!-- Add Modal -->
   <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ url('/event/add') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="txtname" class="form-label">Event Title</label>
                        <input type="text" class="form-control" name="txtname" id="txtname">
                        <span class="text-danger mt-2">@error('txtname') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="txtdate" class="form-label">Date</label>
                        <input type="date" class="form-control" name="txtdate" id="txtdate">
                        <span class="text-danger mt-2">
                            @error('txtemail') 
                                {{ $message }} 
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="txtreport" class="form-label">Report</label>
                        <input type="file" class="form-control" name="txtreport" id="txtreport" value="1">
                    </div>
                    <div class="mb-3">
                        <label for="txtdetails" class="form-label">Details</label>
                        <textarea class="form-control" name="txtdetails" id="txtdetails"></textarea>    
                    </div>
                    <div class="mb-3">
                        <label for="txtstatus" class="form-label">Active</label>
                        <input type="checkbox" class="form-check-input" name="txtstatus" id="txtstatus" value="1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
    @if(!$events->isEmpty())
    <div class="table-responsive">
    <table class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
        <thead>
            <tr class="table-dark">
                <th>Id</th>
                <th>Name</th>
                <th>Date</th>
                <th>Details</th>
                <th>Status</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($events as $i => $event)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->details }}</td>
                    <td>
                        @if ($event->status)
                          <div class="text-success">Active</div>  
                        @else
                          <div class="text-danger">Inactive</div>  
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $event->id }}">
                            Edit
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $event->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                <!-- Confirm Delete Modal -->
                <div class="modal fade" id="confirmDeleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $event->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this admin?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ url('/event/delete/' . $event->id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $event->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $event->id }}">Edit Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ url('/event/edit') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="txtid" value="{{$event->id}}"/>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="txtname" class="form-label">Event Title</label>
                                        <input type="text" class="form-control" name="txtname" id="txtname" value="{{$event->name}}">
                                        <span class="text-danger mt-2">@error('txtname') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtdate" class="form-label">Date</label>
                                        <input type="date" class="form-control" name="txtdate" id="txtdate" value="{{$event->date}}">
                                        <span class="text-danger mt-2">
                                            @error('txtemail') 
                                                {{ $message }} 
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtreport" class="form-label">Report</label>
                                        <input type="file" class="form-control" name="txtreport" id="txtreport" value="1" value="{{$event->report}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtdetails" class="form-label">Details</label>
                                        <textarea class="form-control" name="txtdetails" id="txtdetails">{{$event->details}}</textarea>    
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtstatus" class="form-label">Active</label>
                                        <input type="checkbox" class="form-check-input" name="txtstatus" id="txtstatus" value="1" {{ $event->status ? 'checked' : '' }}>
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
            <h1>No Events Yet!</h1>
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
