@extends('layouts.main')

@section('main-section')

<link rel="stylesheet" href="{{ asset('assets/client/css/clubs.css') }}">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const galleryItems = document.querySelectorAll('.gallery-item');
        const lightbox = document.createElement('div');
        lightbox.classList.add('lightbox');
        document.body.appendChild(lightbox);

        galleryItems.forEach(item => {
            item.addEventListener('click', function() {
                const imgSrc = this.querySelector('.gallery-img').src;
                const largeImg = document.createElement('img');
                largeImg.src = imgSrc;
                lightbox.innerHTML = ''; // Clear previous image
                lightbox.appendChild(largeImg);
                lightbox.style.display = 'flex'; // Show lightbox
            });
        });

        lightbox.addEventListener('click', function() {
            lightbox.style.display = 'none'; // Hide lightbox on click
        });
    });
</script>

<div class="club-container">
    <div class="club-content">
        <!-- Home Section -->
        <div class="club-info">
            <img src="{{ asset('assets/static/iyf_logo.png') }}" alt="Ignited Youth Forum Logo">
            <div class="club-details">
                <h1>Ignited Youth Forum</h1>
                <div id="club-home" class="tab-section active">
                    <p>The Ignited Youth Forum (GMCA) is a platform for young individuals to foster creativity, leadership, and social engagement. We aim to inspire youth to participate actively in community development and to become agents of positive change. The forum offers various workshops, events, and programs focusing on personal and professional development.</p>
                    <p>Our mission is to nurture innovative ideas, provide opportunities for skill development, and encourage collaboration among students. Join us to ignite your potential and be part of a vibrant community of future leaders.</p>
                </div>

                <!-- Events Section -->
                <div id="club-events" class="tab-section">
                    <h2>Events</h2>
                    <div class="event-list">
                        @if(isset($events) && count($events) > 0)
                        @foreach($events as $event)
                        <div class="event-item">
                            <h3>{{ $event->name }}</h3>
                            <p class="event-date">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</p>
                        </div>
                        @endforeach
                        @else
                        <p>No events found.</p>
                        @endif
                    </div>
                </div>

                <!-- Gallery Section -->
                <div id="club-gallery" class="tab-section">
                    <h2>Event Gallery</h2>
                    @if(isset($gallery) && count($gallery) > 0)
                    <div class="gallery-grid">
                        @foreach($gallery as $photo)
                        @if($photo->status == 1)
                        @php
                        $imagePath = asset('assets/admin/images/events/' . $photo->image);
                        @endphp
                        <div class="gallery-item">
                            <img src="{{ $imagePath }}" alt="Event Photo" class="gallery-img" />
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @else
                    <p>No images found for IYFE events.</p>
                    @endif
                </div>



                <!-- Contact Section -->
                <div id="club-contact" class="tab-section">
                    <h2>Contact Us</h2>
                    <p>Email: iyf@university.com</p>
                    <p>Phone: +91 9876543210</p>
                    <p>Address: GMCA Campus, Room 101, Youth Forum Office</p>
                </div>


                <!-- Testimonials Section -->
                <div id="club-testimonials" class="tab-section">
                    <h2>Testimonials <button class="btn btn-success" style="float: right; background-color: #2d3e50;" onclick="showAddModal()">Add Testimonial</button> </h2>
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            Testimonial request has been submitted. Please wait until it is approved by the admin.
                        </div>
                    @endif
                    <div class="testimonial-container">
                        @if (isset($testimonials) && count($testimonials) > 0)
                        @foreach ($testimonials as $testimonial)
                        <div class="testimonial-card">
                            <p class="testimonial-quote">"<? $testimonial->message ?>"</p>
                            <span class="testimonial-author"><span class="author-title">- <? $testimonial->name ?></span></span>
                        </div>
                        @endforeach
                        @else
                        <p>No testimonials found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Add Testimonial Modal -->
    <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="addTestimonialModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTestimonialModalLabel">Add Testimonial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/testimonials/add" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="testimonial-message">Message</label>
                                <textarea id="testimonial-message" name="message" class="form-control" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="testimonial-name">Name</label>
                                <input type="text" id="testimonial-name" name="name" class="form-control" required>
                            </div>
                            <input type="hidden" name="club" value="iyf">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <div class="toggle-sidebar">Menu</div>
    <div class="club-sidebar">
        <!-- <span class="close-btn" onclick="toggleSidebar()" style="cursor: pointer;">✖</span> -->
        <a href="#info">Home</a>
        <a href="#events">Events</a>
        <a href="#gallery">Gallery</a>
        <a href="#testimonials">Testimonials</a>
        <!-- <a onclick="showSection('club-home')">Home</a>
        <a onclick="showSection('club-events')">Events</a>
        <a onclick="showSection('club-gallery')">Gallery</a>
        <a onclick="showSection('club-contact')">Contact</a> -->
    </div>
</div>

<script>
    function showSectionFromHash() {
        // Define the mapping of hash values to section IDs
        const sectionMapping = {
            'info': 'club-home',
            'events': 'club-events',
            'gallery': 'club-gallery',
            'contact': 'club-contact',
            'testimonials': 'club-testimonials'
        };

        // Get the current hash from the URL (without the # symbol)
        const hash = window.location.hash.substring(1);

        if (hash && sectionMapping[hash]) {
            document.querySelectorAll('.tab-section').forEach(section => {
                section.classList.remove('active');
            });

            const sectionToShow = document.getElementById(sectionMapping[hash]);
            if (sectionToShow) {
                sectionToShow.classList.add('active');
            }
        } else {
            document.getElementById('club-home').classList.add('active');
        }
    }

    // Call the function on page load
    window.addEventListener('load', showSectionFromHash);

    // Call the function whenever the hash changes
    window.addEventListener('hashchange', showSectionFromHash);

    function showAddModal() {
            const modal = new bootstrap.Modal(document.getElementById('addTestimonialModal'));
            modal.show();
        }
</script>

@endsection