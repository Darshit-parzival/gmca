@extends('admin.layouts.main')
@section('main-section')
    <style>
        .accordion-item {
            border-top: 1px solid #ddd;
            border-left: none;
            border-right: none;
            border-bottom: none;
        }
        .image-container {
            position: relative;
            height: 100px;
            background-size: cover;
            background-position: center;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-actions {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 5px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            justify-content: space-between;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .position-relative:hover .image-actions {
            opacity: 1;
        }
    </style>

    <div class="container p-5">
        <div>
            <h1>Web Portal Data</h1>
        </div>
        <hr class="mb-5">
        <div>
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
        </div>

        <div class="accordion" id="webPortalAccordion">

            <!-- Main Slider Section -->
            <div class="accordion-item mb-3 border-top">
                <h2 class="accordion-header" id="headingSlider">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSlider" aria-expanded="true" aria-controls="collapseSlider">
                        <h5 class="event-name">Main Slider</h5>
                    </button>
                </h2>
                <div id="collapseSlider" class="accordion-collapse collapse show" aria-labelledby="heading"
                    data-bs-parent="#collapseSlider">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-3 mb-3 d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSliderModal">Add
                                    New</button>
                            </div>

                            @foreach ($webportal_datas as $data)
                                <div class="col-md-3 mb-3 border position-relative">
                                    <div class="image-container"
                                        style="background-image: url('{{ asset('/assets/admin/images/slider/' . $data->webportal_file) }}'); height: 200px">
                                        <div class="image-actions d-flex flex-row px-2 py-1">
                                            @if ($data->webportal_status == 1)
                                                <a href="/admin/webportal/op/{{ $data->id }}"
                                                    class="btn btn-warning btn-sm me-2">Deactive</a>
                                            @else
                                                <a href="/admin/webportal/op/{{ $data->id }}"
                                                    class="btn btn-success btn-sm me-2">Active</a>
                                            @endif
                                            <a href="/admin/webportal/delete/{{ $data->id }}"
                                                class="btn btn-danger btn-sm ms-auto">Delete</a>
                                        </div>
                                    </div>
                                    <p><b>Title: </b>{{ $data->webportal_title }}</p>
                                    <p><b>Description: </b>{{ $data->webportal_details }}</p>
                                </div>
                            @endforeach
                        </div>
                        <span class="text-danger mt-2">
                            @error('webportal_type')
                                {{ $message }}
                            @enderror
                        </span>
                        <span class="text-danger mt-2">
                            @error('webportal_file')
                                {{ $message }}
                            @enderror
                        </span>
                        <span class="text-danger mt-2">
                            @error('webportal_title')
                                {{ $message }}
                            @enderror
                        </span>
                        <span class="text-danger mt-2">
                            @error('webportal_details')
                                {{ $message }}
                            @enderror
                        </span>
                        <span class="text-danger mt-2">
                            @error('webportal_status')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>


            <!-- About Section -->
            <div class="accordion-item mb-3 border-top">
                <h2 class="accordion-header" id="headingAbout">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseAbout" aria-expanded="false" aria-controls="collapseAbout">
                        <h5 class="event-name">About Section</h5>
                    </button>
                </h2>
                <div id="collapseAbout" class="accordion-collapse collapse" aria-labelledby="headingAbout"
                    data-bs-parent="#webPortalAccordion">
                    <div class="accordion-body">
                        <form>
                            <div class="mb-3">
                                <label for="aboutText" class="form-label">Detail</label>
                                <textarea class="form-control" id="aboutText" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="aboutImage" class="form-label">Upload Image</label>
                                <input class="form-control" type="file" id="aboutImage">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Vision and Mission Section -->
            <div class="accordion-item mb-3 border-top">
                <h2 class="accordion-header" id="headingVisionMission">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseVisionMission" aria-expanded="false" aria-controls="collapseVisionMission">
                        <h5 class="event-name">Vision and Mission</h5>
                    </button>
                </h2>
                <div id="collapseVisionMission" class="accordion-collapse collapse" aria-labelledby="headingVisionMission"
                    data-bs-parent="#webPortalAccordion">
                    <div class="accordion-body">
                        <form>
                            <div class="mb-3">
                                <label for="visionText" class="form-label">Vision</label>
                                <textarea class="form-control" id="visionText" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="visionPdf" class="form-label">Upload PDF</label>
                                <input class="form-control" type="file" id="visionPdf">
                            </div>
                            <div class="mb-3">
                                <label for="missionText" class="form-label">Mission</label>
                                <textarea class="form-control" id="missionText" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="missionPdf" class="form-label">Upload PDF</label>
                                <input class="form-control" type="file" id="missionPdf">
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal for adding new slider -->
    <div class="modal fade" id="addSliderModal" tabindex="-1" aria-labelledby="addSliderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSliderModalLabel">Add New Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/webportal/add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="webportal_type" value="slider">
                        <div class="mb-3">
                            <label for="sliderImage" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="sliderImage" name="webportal_file" required>
                        </div>
                        <div class="mb-3">
                            <label for="sliderTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="sliderTitle" name="webportal_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="sliderDetail" class="form-label">Detail</label>
                            <textarea class="form-control" id="sliderDetail" name="webportal_details" rows="3" required></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" value="1" id="sliderStatus"
                                name="webportal_status">
                            <label class="form-check-label" for="sliderStatus">Active</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
