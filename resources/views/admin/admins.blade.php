@extends('admin.layouts.main')

@section('main-section')
  <div class="w-100 p-2 shadow bg-white rounded-2">
        <div class="p-3">
            <div class="heading mb-5">
                <h2>Admins</h2>
            </div>
            <div class="table-content">
                <table class="table border-1">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <td>{{$user->staff_id}}</td>
                            <td>{{$user->photo}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td><a href="">Edit</a></td>
                            <td><a href="">Delete</a></td>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
  </div>
@endsection
