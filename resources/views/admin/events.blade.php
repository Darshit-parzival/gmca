@extends('admin.layouts.main')
@section('main-section')

<div class="container p-5">
    <div>
        <h1>Admins</h1>
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

    @if (count($events) > 0)
    <table class="table table-bordered bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
        <tr class="table-dark">
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Photo</th>
            <th colspan="2">Operation</th>
        </tr>
        <?php $i=0; ?>
        @foreach ($events as $user)
        <tr>
            <td>{{$i=$i+1;}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td><img src="{{ url('/assets/admin/images/admins/') }}/{{$user->photo}}" alt="Photo" width="50"></td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#editModal{{$user->staff_id}}">
                    Edit
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal{{ $user->staff_id }}">
                    Delete
                </button>
            </td>

                <!-- Confirm Delete Modal -->
                <div class="modal fade" id="confirmDeleteModal{{ $user->staff_id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $user->staff_id }}" aria-hidden="true">
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
                                <a href="{{ url('/admin/delete/' . $user->staff_id) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $user->staff_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->staff_id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $user->staff_id }}">Edit Admin</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ url('/admin/edit') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="staff_id" value="{{ $user->staff_id }}">
                                    <div class="mb-3">
                                        <label for="txtname{{ $user->staff_id }}" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="txtname" id="txtname{{ $user->staff_id }}" value="{{ $user->name }}">
                                        <span class="text-danger mt-2">@error('txtname') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtemail{{ $user->staff_id }}" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="txtemail" id="txtemail{{ $user->staff_id }}" value="{{ $user->email }}">
                                        <span class="text-danger mt-2">@error('txtemail') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtphone{{ $user->staff_id }}" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="txtphone" id="txtphone{{ $user->staff_id }}" value="{{ $user->phone }}">
                                        <span class="text-danger mt-2">@error('txtphone') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="txtgender" id="genderMale{{ $user->staff_id }}" value="m" {{ $user->gender == 'm' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genderMale{{ $user->staff_id }}">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="txtgender" id="genderFemale{{ $user->staff_id }}" value="f" {{ $user->gender == 'f' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genderFemale{{ $user->staff_id }}">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="txtgender" id="genderOther{{ $user->staff_id }}" value="o" {{ $user->gender == 'o' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genderOther{{ $user->staff_id }}">Other</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtphoto{{ $user->staff_id }}" class="form-label">Photo</label>
                                        <div>
                                            <img src="{{ url('/assets/admin/images/admins/') }}/{{$user->photo}}" alt="Photo"
                                                width="150">
                                        </div>
                                        <input type="file" class="form-control" id="txtphoto{{ $user->staff_id }}" name="txtphoto">
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisadmin{{ $user->staff_id }}" class="form-label">Admin</label>
                                        <input type="checkbox" class="form-check-input" name="txtisadmin" id="txtisadmin{{ $user->staff_id }}" value="1" {{ $user->isadmin ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisfaculty{{ $user->staff_id }}" class="form-label">Faculty</label>
                                        <input type="checkbox" class="form-check-input" name="txtisfaculty" id="txtisfaculty{{ $user->staff_id }}" value="1" {{ $user->isfaculty ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisclubco{{ $user->staff_id }}" class="form-label">Club Coordinator</label>
                                        <input type="checkbox" class="form-check-input" name="txtisclubco" id="txtisclubco{{ $user->staff_id }}" value="1" {{ $user->isclubco ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtislibrarian{{ $user->staff_id }}" class="form-label">Librarian</label>
                                        <input type="checkbox" class="form-check-input" name="txtislibrarian" id="txtislibrarian{{ $user->staff_id }}" value="1" {{ $user->islibrarian ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisstaff{{ $user->staff_id }}" class="form-label">Staff</label>
                                        <input type="checkbox" class="form-check-input" name="txtisstaff" id="txtisstaff{{ $user->staff_id }}" value="1" {{ $user->isstaff ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisadvisor{{ $user->staff_id }}" class="form-label">Advisor</label>
                                        <input type="checkbox" class="form-check-input" name="txtisadvisor" id="txtisadvisor{{ $user->staff_id }}" value="1" {{ $user->isadvisor ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtispanel{{ $user->staff_id }}" class="form-label">Panel</label>
                                        <input type="checkbox" class="form-check-input" name="txtispanel" id="txtispanel{{ $user->staff_id }}" value="1" {{ $user->ispanel ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </tr>
        @endforeach
    </table>
    @else
    <h2 class="text-center">No events</h2>
    @endif

</div>
@endsection
