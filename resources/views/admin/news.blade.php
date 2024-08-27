@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>News & Notices</h1>
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
                    <h5 class="modal-title" id="addModalLabel">Add News/Notice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ url('/news/add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="txttitle" class="form-label">Title</label>
                            <input type="text" class="form-control" name="txttitle" id="txttitle">
                            <span class="text-danger mt-2">@error('txttitle') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="txtdetails" class="form-label">Details</label>
                            <textarea class="form-control" name="txtdetails" id="txtdetails"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="txtreport" class="form-label">Report</label>
                            <input type="file" class="form-control" name="txtreport" id="txtreport">
                        </div>
                        <div class="mb-3">
                            <label for="txtstatus" class="form-label">Active</label>
                            <input type="checkbox" class="form-check-input" name="txtstatus" id="txtstatus" value="1">
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add News/Notice</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(!$news->isEmpty())
    <table class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
        <thead>
            <tr class="table-dark">
                <th>Id</th>
                <th>Title</th>
                <th>Details</th>
                <th>Report</th>
                <th>Status</th>
                <th colspan="2">Operation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $i => $notice)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $notice->title }}</td>
                <td>{{ $notice->details }}</td>
                <td>
                    @if($notice->report)
                      <a href="{{ asset('assets/admin/news_reports/' . $notice->report) }}" target="_blank">View Report</a>
                    @else
                    No Report
                    @endif
                </td>
                <td>
                    @if ($notice->status)
                      <div class="text-success">Active</div>  
                    @else
                      <div class="text-danger">Inactive</div>  
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $notice->id }}">
                        Edit
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $notice->id }}">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Confirm Delete Modal -->
            <div class="modal fade" id="confirmDeleteModal{{ $notice->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $notice->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel{{ $notice->id }}">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this news/notice?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a href="{{ url('/news/delete/' . $notice->id) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $notice->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $notice->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $notice->id }}">Edit News/Notice</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ url('/news/edit/') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="txtid" value="{{$notice->id}}"/>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="txttitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="txttitle" id="txttitle" value="{{$notice->title}}">
                                    <span class="text-danger mt-2">@error('txttitle') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label for="txttype" class="form-label">Type</label>
                                    <select class="form-control" name="txttype" id="txttype" required>
                                        <option value="news" {{ $notice->type == 'news' ? 'selected' : '' }}>News</option>
                                        <option value="notice" {{ $notice->type == 'notice' ? 'selected' : '' }}>Notice</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="txtdetails" class="form-label">Details</label>
                                    <textarea class="form-control" name="txtdetails" id="txtdetails">{{$notice->details}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="txtreport" class="form-label">Report</label>
                                    <input type="file" class="form-control" name="txtreport" id="txtreport">
                                    <input type="hidden" name="existing_report" value="{{ $notice->report }}">
                                </div>
                                <div class="mb-3">
                                    <label for="txtstatus" class="form-label">Active</label>
                                    <input type="checkbox" class="form-check-input" name="txtstatus" id="txtstatus" value="1" {{ $notice->status ? 'checked' : '' }}>
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
    @else
    <div class="p-5 m-5 text-center">
        <h1>No News/Notices Yet!</h1>
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