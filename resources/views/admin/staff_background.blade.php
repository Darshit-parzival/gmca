@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Staff Background Data</h1>
    </div>
    <hr class="mb-5">
    <div class="top-actions d-flex">
        <div style="flex: 1;">
            <button id="exportButton" class="btn btn-secondary">Export</button>
        </div>
        <div style="margin-left:auto;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Add New Background
            </button>
        </div>
    </div>
    <!-- Filter Form -->
    <form method="GET" action="{{ url('/admin/staff-background') }}" class="mb-2 mt-3">
        <div class="mb-3">
            <select class="form-select" name="filterType" id="filterType" onchange="this.form.submit()">
                <option value="" selected>All Types</option>
                <option value="skills" {{ request('filterType') == 'skills' ? 'selected' : '' }}>Skills</option>
                <option value="course_taught" {{ request('filterType') == 'course_taught' ? 'selected' : '' }}>Course Taught</option>
                <option value="portfolio" {{ request('filterType') == 'portfolio' ? 'selected' : '' }}>Portfolio</option>
                <option value="publication" {{ request('filterType') == 'publication' ? 'selected' : '' }}>Publication</option>
                <option value="patent" {{ request('filterType') == 'patent' ? 'selected' : '' }}>Patent</option>
                <option value="prof_inst" {{ request('filterType') == 'prof_inst' ? 'selected' : '' }}>Professional Institution</option>
                <option value="research_project" {{ request('filterType') == 'research_project' ? 'selected' : '' }}>Research Project</option>
                <option value="academic_project" {{ request('filterType') == 'academic_project' ? 'selected' : '' }}>Academic Project</option>
                <option value="awards" {{ request('filterType') == 'awards' ? 'selected' : '' }}>Awards</option>
            </select>
        </div>
    </form>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Staff Background</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ url('/admin/staff-background/add') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" name="type" id="type" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="skills">Skills</option>
                                <option value="course_taught">Course Taught</option>
                                <option value="portfolio">Portfolio</option>
                                <option value="publication">Publication</option>
                                <option value="patent">Patent</option>
                                <option value="prof_inst">Professional Institution</option>
                                <option value="research_project">Research Project</option>
                                <option value="academic_project">Academic Project</option>
                                <option value="awards">Awards</option>
                            </select>
                            <span class="text-danger mt-2">@error('type') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" maxlength="30" required>
                            <span class="text-danger mt-2">@error('name') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control" name="details" id="details" rows="3" required></textarea>
                            <span class="text-danger mt-2">@error('details') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Active</label>
                            <input type="checkbox" class="form-check-input" name="status" id="status" value="1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Background</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(!$staffBackgrounds->isEmpty())
    <div class="table-responsive">
        <table id="pagetable" class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
            <thead>
                <tr class="table-dark">
                    <th>Id</th>
                    <th>Staff ID</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffBackgrounds as $i => $background)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $background->staff_id }}</td>
                    <td>{{ $background->type }}</td>
                    <td>{{ $background->name }}</td>
                    <td>{{ $background->details }}</td>
                    <td>
                        @if ($background->status)
                            <div class="text-success">Active</div>
                        @else
                            <div class="text-danger">Inactive</div>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center">
                        <button type="button" class="me-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $background->bg_id }}">
                            Edit
                        </button>
                    
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $background->bg_id }}">
                            Delete
                        </button>
                        </div>
                    </td>
                </tr>

                <!-- Confirm Delete Modal -->
                <div class="modal fade" id="confirmDeleteModal{{ $background->bg_id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $background->bg_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this background record?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ url('/admin/staff-background/delete/'. $background->bg_id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $background->bg_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $background->bg_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $background->bg_id }}">Edit Background</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ url('/admin/staff-background/edit') }}">
                                @csrf
                                <input type="hidden" name="bg_id" value="{{ $background->bg_id }}">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="type" class="form-label">Type</label>
                                        <select class="form-select" name="type" id="type" required>
                                            <option value="" disabled>Select Type</option>
                                            <option value="skills" {{ $background->type == 'skills' ? 'selected' : '' }}>Skills</option>
                                            <option value="course_taught" {{ $background->type == 'course_taught' ? 'selected' : '' }}>Course Taught</option>
                                            <option value="portfolio" {{ $background->type == 'portfolio' ? 'selected' : '' }}>Portfolio</option>
                                            <option value="publication" {{ $background->type == 'publication' ? 'selected' : '' }}>Publication</option>
                                            <option value="patent" {{ $background->type == 'patent' ? 'selected' : '' }}>Patent</option>
                                            <option value="prof_inst" {{ $background->type == 'prof_inst' ? 'selected' : '' }}>Professional Institution</option>
                                            <option value="research_project" {{ $background->type == 'research_project' ? 'selected' : '' }}>Research Project</option>
                                            <option value="academic_project" {{ $background->type == 'academic_project' ? 'selected' : '' }}>Academic Project</option>
                                            <option value="awards" {{ $background->type == 'awards' ? 'selected' : '' }}>Awards</option>
                                        </select>
                                        <span class="text-danger mt-2">@error('type') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $background->name }}" maxlength="30" required>
                                        <span class="text-danger mt-2">@error('name') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="details" class="form-label">Details</label>
                                        <textarea class="form-control" name="details" id="details" rows="3" required>{{ $background->details }}</textarea>
                                        <span class="text-danger mt-2">@error('details') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Active</label>
                                        <input type="checkbox" class="form-check-input" name="status" id="status" value="1" {{ $background->status ? 'checked' : '' }}>
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
    @else
    <div class="alert alert-info">
        No background records found.
    </div>
    @endif
</div>

@endsection
