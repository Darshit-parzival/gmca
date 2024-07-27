@extends('admin.layouts.main')
@section('main-section')

<div class="container">
    @if(!$users->isEmpty())
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
        @foreach ($users as $user)
        <tr>
            <td>{{$i=$i+1;}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->photo}}</td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{$user->staff_id}}">
                    Edit
                </button>
            </td>
        </tr>
        <div class="modal fade w-100" id="confirmDeleteModal{{$user->staff_id}}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{$user->staff_id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Edit section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{url("/")}}/edit">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" rows="5" class="form-control" name="email" value="{{$user-> email}}"/>
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" rows="5" class="form-control" name="Phone" value="{{$user-> phone}}"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <input type="hidden" name="con_id" value="{{$user->staff_id}}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </table>
    <div class="mt-4">
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error') }}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success') }}
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
