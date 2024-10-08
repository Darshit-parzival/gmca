@extends('admin.layouts.main')
@section('main-section')

    <style>
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
            <h1>Event Gallery</h1>
        </div>
        <div class="mb-4">
            <input type="text" id="searchInput" class="form-control" placeholder="Search events by name...">
        </div>
        @if ($events->count())
            <div class="accordion" id="eventsAccordion">
                @foreach ($events as $i => $event)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $i }}">
                            <div class="d-flex align-items-center">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $i }}" aria-expanded="false"
                                    aria-controls="collapse{{ $i }}">
                                    <span class="me-2">
                                        <h5 class="event-name">{{ $i + 1 }}. {{ $event->name }}</h5>
                                    </span>
                                </button>
                            </div>
                        </h2>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse"
                            aria-labelledby="heading{{ $i }}" data-bs-parent="#eventsAccordion">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-3 mb-3 d-flex justify-content-center align-items-center">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#addImageModal" data-event-id="{{ $event->id }}">Add
                                            New</button>
                                    </div>

                                    @foreach ($event->galleries as $image)
                                        <div class="col-md-3 mb-3 border position-relative">
                                            <div class="image-container"
                                                style="background-image: url('{{ asset('/assets/admin/images/events/' . $image->image) }}');height:200px">
                                                <div class="image-actions d-flex flex-row px-2 py-1">
                                                    @if ($image->status == 1)
                                                        <a href="/admin/gallery/op/{{ $image->id }}"
                                                            class="btn btn-warning btn-sm me-2">Deactive</a>
                                                    @else
                                                        <a href="/admin/gallery/op/{{ $image->id }}"
                                                            class="btn btn-success btn-sm me-2">Active</a>
                                                    @endif
                                                    <a href="/admin/gallery/delete/{{ $image->id }}"
                                                        class="btn btn-danger btn-sm ms-auto">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="pagination" class="d-flex justify-content-center mt-4"></div>
        @else
            <div class="p-5 m-5 text-center">
                <h1>No Events Yet!</h1>
            </div>
        @endif

        <div class="mt-4">
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
    </div>

    <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/admin/gallery/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addImageModalLabel">Add New Images</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="event_id" id="event_id">
                        <div class="mb-3">
                            <label for="images" class="form-label">Select Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const itemsPerPage = 4; // Number of items to show per page
            const items = document.querySelectorAll('.accordion-item');
            const totalPages = Math.ceil(items.length / itemsPerPage);

            // Show only items for the current page
            function showPage(page) {
                items.forEach((item, index) => {
                    item.style.display = (Math.floor(index / itemsPerPage) === page) ? 'block' : 'none';
                });
            }

            // Create pagination buttons
            function createPagination() {
                const pagination = document.getElementById('pagination');
                pagination.innerHTML = '';
                for (let i = 0; i < totalPages; i++) {
                    const btn = document.createElement('button');
                    btn.innerText = i + 1;
                    btn.className = 'btn btn-secondary mx-1';
                    btn.addEventListener('click', () => {
                        showPage(i);
                    });
                    pagination.appendChild(btn);
                }
            }

            showPage(0); // Show first page initially
            createPagination(); // Create pagination buttons

            // Filter events by search input
            $('#searchInput').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                items.forEach(item => {
                    const eventName = item.querySelector('.event-name').innerText.toLowerCase();
                    item.style.display = eventName.includes(value) ? 'block' : 'none';
                });
            });

            // Modal image add functionality
            const addImageModal = document.getElementById('addImageModal');
            addImageModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const eventId = button.getAttribute('data-event-id');
                const modalEventIdInput = addImageModal.querySelector('#event_id');
                modalEventIdInput.value = eventId;
            });
        });
    </script>

@endsection
