@extends('admin.layouts.main')
@section('main-section')
<div class="ms-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="row g-4">
        <!-- Total Admins -->
        <div class="col-md-4">
            <div class="card text-white bg-primary shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Admins</h5>
                    <p class="card-text display-4">12</p>
                </div>
            </div>
        </div>

        <!-- Total Faculties -->
        <div class="col-md-4">
            <div class="card text-white bg-success shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Faculties</h5>
                    <p class="card-text display-4">34</p>
                </div>
            </div>
        </div>

        <!-- Total Contact Us -->
        <div class="col-md-4">
            <div class="card text-white bg-danger shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Contact Us</h5>
                    <p class="card-text display-4">45</p>
                </div>
            </div>
        </div>

        <!-- Total Events -->
        <div class="col-md-4">
            <div class="card text-white bg-warning shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Events</h5>
                    <p class="card-text display-4">20</p>
                </div>
            </div>
        </div>

        <!-- Total Students -->
        <div class="col-md-4">
            <div class="card text-white bg-info shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text display-4">200</p>
                </div>
            </div>
        </div>

        <!-- Total News/Notice -->
        <div class="col-md-4">
            <div class="card text-white bg-secondary shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Total News/Notice</h5>
                    <p class="card-text display-4">15</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
