@extends('admin.layouts.main')
@section('main-section')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="ms-4 row g-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Admins</h5>
                    <p class="card-text display-4">{{ $totalAdmins }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Faculties</h5>
                    <p class="card-text display-4">{{ $totalFaculties }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Contact Us</h5>
                    <p class="card-text display-4">{{ $totalContacts }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Events</h5>
                    <p class="card-text display-4">{{ $totalEvents }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text display-4">{{ $totalStudents }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-secondary shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total News/Notice</h5>
                    <p class="card-text display-4">{{ $totalNews }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
