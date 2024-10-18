@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Testimonial Data</h1>
    </div>
    <hr class="mb-5">

    @if(!$testimonials->isEmpty())
    <div class="table-responsive">
        <table id="pagetable" class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
            <thead>
                <tr class="table-dark">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Message</th>
                    <th>Club</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->t_id }}</td>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->message }}</td>
                    <td>{{ $testimonial->club }}</td>
                    <td>
                        @if ($testimonial->status)
                            <div class="text-success">Active</div>
                        @else
                            <div class="text-danger">Inactive</div>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- Toggle Status Button -->
                            @if ($testimonial->status)
                                <a href="{{ url('/admin/testimonials/deactivate/' . $testimonial->t_id) }}" class="btn btn-warning me-2">Deactivate</a>
                            @else
                                <a href="{{ url('/admin/testimonials/activate/' . $testimonial->t_id) }}" class="btn btn-success me-2">Activate</a>
                            @endif

                            <!-- Delete Button -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $testimonial->t_id }}">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Confirm Delete Modal -->
                <div class="modal fade" id="confirmDeleteModal{{ $testimonial->t_id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $testimonial->t_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel{{ $testimonial->t_id }}">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this testimonial from {{ $testimonial->name }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ url('/admin/testimonials/delete/' . $testimonial->t_id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="p-5 m-5 text-center">
        <h1>No Testimonials Available Yet!</h1>
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
