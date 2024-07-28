@extends('admin.layouts.main')
@section('main-section')

<div class="container">
    @if(!$admins->isEmpty())
    <table class="table bg-white text-dark text-center p-3 mt-4 shadow rounded-3 align-middle">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Photo</th>
            <th>Operation</th>
        </tr>
        <?php $i=0; ?>
        @foreach ($admins as $user)
        <tr>
            <td>{{$i=$i+1;}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td><img src="{{ url('/assets/images/admins/') }}/{{$user->photo}}" alt="Photo" width="50"></td>
            <td>
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{$user->staff_id}}">
                    Edit
                </button>
            </td>
            <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $user->staff_id }}">
                        Delete
                    </button>
                </td>

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
                                <a href="/admin/delete/{{$user->staff_id}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
        </tr>

        <!-- Edit Modal -->
        <div class="custom-modal">
            <div class="modal fade" id="editModal{{$user->staff_id}}" tabindex="-1" aria-labelledby="editModalLabel{{$user->staff_id}}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{$user->staff_id}}">Edit Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ url('/admin') }}/edit" enctype="multipart/form-data">
                            @csrf   
                            <div class="modal-body">
                                <div class="mb-4 d-flex flex-column justify-content-lg-between">
                                    <input type="hidden" name="staff_id" value="{{ $user->staff_id }}">
                                    <div class="mb-3">
                                        <label for="txtname" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="txtname" id="txtname" value="{{ $user->name }}"/>
                                        <span class="text-danger mt-2">
                                            @error("txtname")
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtemail" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="txtemail" id="txtemail" value="{{ $user->email }}"/>
                                        <span class="text-danger mt-2">
                                            @error("txtemail")
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtphone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="txtphone" id="txtphone" value="{{ $user->phone }}"/>
                                        <span class="text-danger mt-2">
                                            @error("txtphone")
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="txtgender" id="genderMale{{$user->staff_id}}" value="m" {{ $user->gender == 'm' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genderMale{{$user->staff_id}}">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="txtgender" id="genderFemale{{$user->staff_id}}" value="f" {{ $user->gender == 'f' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genderFemale{{$user->staff_id}}">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="txtgender" id="genderOther{{$user->staff_id}}" value="o" {{ $user->gender == 'o' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="genderOther{{$user->staff_id}}">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtphoto" class="form-label">Photo</label>
                                        <div>
                                            <img src="{{ url('/assets/images/admins/') }}/{{$user->photo}}" alt="Photo" width="150">
                                        </div>
                                        <input type="file" class="form-control" id="txtphoto" name="txtphoto" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisadmin" class="form-label">Admin</label>
                                        <input type="checkbox" class="form-check-input" name="txtisadmin" id="txtisadmin" value="1" {{ $user->isadmin ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisfaculty" class="form-label">Faculty</label>
                                        <input type="checkbox" class="form-check-input" name="txtisfaculty" id="txtisfaculty" value="1" {{ $user->isfaculty ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisclubco" class="form-label">Club Coordinator</label>
                                        <input type="checkbox" class="form-check-input" name="txtisclubco" id="txtisclubco" value="1" {{ $user->isclubco ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtislibrarian" class="form-label">Librarian</label>
                                        <input type="checkbox" class="form-check-input" name="txtislibrarian" id="txtislibrarian" value="1" {{ $user->islibrarian ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtisstaff" class="form-label">Staff</label>
                                        <input type="checkbox" class="form-check-input" name="txtisstaff" id="txtisstaff" value="1"  {{ $user->isstaff ? 'checked' : '' }}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtdesignation" class="form-label">Designation</label>
                                        <input type="text" class="form-control" name="txtdesignation" id="txtdesignation" value="{{ $user->designation }}"/>
                                        <span class="text-danger mt-2">
                                            @error("txtdesignation")
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="txtexp_year" class="form-label">Experience Year</label>
                                        <input type="text" class="form-control" name="txtexp_year" id="txtexp_year" value="{{ $user->exp_year }}"/>
                                        <span class="text-danger mt-2">
                                            @error("txtexp_year")
                                                {{$message}}
                                            @enderror
                                        </span>
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
        </div>
        @endforeach
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
    @else
    <div class="p-5 m-5 text-center">
        <h1>No admins</h1>
    </div>
    @endif
</div>
@endsection
