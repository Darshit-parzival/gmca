@extends('admin.layouts.main')
@section('main-section')
    <div class="container p-5">
        <div>
            <h1>Academic Calendar</h1>
        </div>
        <hr />
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="top-actions d-flex">
            <div style="margin-left:auto;">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCalendar">
                    Add New
                </button>
            </div>
        </div>

        @if (!$calendar_data->isEmpty())
            <div class="table-responsive">
                <table id="calendarTable"
                    class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>File</th>
                            <th>Term</th>
                            <th>Organization Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calendar_data as $i => $calendar)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $calendar->calendar_name }}</td>
                                <td><a href="{{ url('/assets/admin/files/calendars/') }}/{{ $calendar->file }}"
                                        target="_blank">View File</a></td>
                                <td>{{ $calendar->is_odd_term ? 'Odd' : 'Even' }}</td>
                                <td>{{ $calendar->is_institute ? 'Institute' : 'University' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#editCalendarModal{{ $calendar->calendar_id }}">Edit</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal{{ $calendar->calendar_id }}">Delete</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Confirm Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{ $calendar->calendar_id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">Are you sure you want to delete this calendar?</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <a href="{{ url('/admin/calendar/delete/' . $calendar->calendar_id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editCalendarModal{{ $calendar->calendar_id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Calendar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form method="post" action="{{ url('/calendar/edit') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $calendar->calendar_id }}">
                                            <div class="mb-3">
                                                <label for="calendarName" class="form-label">Calender Name</label>
                                                <input type="text" class="form-control" name="calendarName"
                                                    id="calendarName">
                                                <span class="text-danger mt-2">
                                                    @error('calendarName')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="calendarFile" class="form-label">Upload File</label>
                                                    <input type="file" class="form-control" id="calendarFile"
                                                        name="calendarFile">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Term</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="term"
                                                            id="termOdd{{ $calendar->id }}" value="odd"
                                                            {{ $calendar->is_odd_term ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="termOdd{{ $calendar->id }}">Odd Term</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="term"
                                                            id="termEven{{ $calendar->id }}" value="even"
                                                            {{ $calendar->is_even_term ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="termEven{{ $calendar->id }}">Even Term</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Organization Type</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="organization_type" id="orgInstitute{{ $calendar->id }}"
                                                            value="institute"
                                                            {{ $calendar->is_institute ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="orgInstitute{{ $calendar->id }}">Institute</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            name="organization_type"
                                                            id="orgUniversity{{ $calendar->id }}" value="university"
                                                            {{ $calendar->is_university ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="orgUniversity{{ $calendar->id }}">University</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
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
                <h1>No Calendars Found</h1>
            </div>
        @endif

        {{-- Add Calendar Modal --}}
        <div class="modal fade" id="addCalendar" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Calendar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ url('/admin/calendar/add') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="mb-3">
                                    <label for="calendarName" class="form-label">Calender Name</label>
                                    <input type="text" class="form-control" name="calendarName" id="calendarName">
                                    <span class="text-danger mt-2">
                                        @error('calendarName')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <!-- File Upload -->
                                <div class="col-md-12">
                                    <label for="file" class="form-label">Upload Calendar File</label>
                                    <input type="file" class="form-control" name="calendarFile" id="calendarFile">
                                    <span class="text-danger mt-2">
                                        @error('file')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <hr class="my-4" />

                                <!-- Term Options -->
                                <div class="col-md-6">
                                    <label class="form-label">Term</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="term" id="is_odd_term"
                                            value="odd">
                                        <label class="form-check-label" for="is_odd_term">Odd Term</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="term" id="is_even_term"
                                            value="even">
                                        <label class="form-check-label" for="is_even_term">Even Term</label>
                                    </div>
                                </div>

                                <!-- Organization Type -->
                                <div class="col-md-6">
                                    <label class="form-label">Organization Type</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="organization_type"
                                            id="is_institute" value="institute">
                                        <label class="form-check-label" for="is_institute">Institute</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="organization_type"
                                            id="is_university" value="university">
                                        <label class="form-check-label" for="is_university">University</label>
                                    </div>
                                </div>
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
    @endsection
