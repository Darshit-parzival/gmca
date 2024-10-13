@extends('layouts.main')

@section('main-section')

<style>
    .club-container {
        margin: 50px auto;
        width: 90%;
        font-family: 'montserratregular', sans-serif;
        display: flex;
    }

    .club-sidebar {
        width: 200px;
        background-color: #e67f22;
        height: auto;
        padding: 20px;
        border-radius: 30px 0 0 30px;
        box-sizing: border-box;
        color: #2d3e50;
        position: fixed;
        right: 0;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
        z-index: 100;
    }

    .toggle-sidebar {
        cursor: pointer;
        position: fixed;
        right: -20px;
        transform: rotate(90deg);
        background: #e67f22;
        color: #2d3e50;
        padding: 10px;
        border-radius: 5px;
        z-index: 200;
        transition: all 0.3s ease;
    }

    .toggle-sidebar:hover {
        opacity: 0;
    }

    .toggle-sidebar:hover+.club-sidebar {
        transform: scaleX(1);
    }

    .club-sidebar:hover {
        transform: scaleX(1);
    }

    .club-sidebar:hover+.toggle-sidebar {
        opacity: 0;
    }

    .toggle-sidebar {
        opacity: 1;
    }

    .club-sidebar a {
        display: block;
        text-decoration: none;
        padding: 10px;
        margin: 10px 0;
        font-weight: bold;
        transition: background 0.3s ease;
        cursor: pointer;
        /* Change to pointer for clickable */
    }

    .club-sidebar a:hover {
        background-color: white;
        color: #333;
    }

    .club-content {
        width: calc(100% - 250px);
        padding: 20px;
        flex-grow: 1;
    }

    .tab-section {
        display: none;
    }

    .tab-section.active {
        display: block;
    }

    .club-info {
        display: flex;
        align-items: flex-start;

        gap: 20px;
    }

    .club-info img {
        width: 300px;
        border-radius: 10px;
    }

    .club-details {
        flex-flow: column;
        flex-grow: 1;
        align-items: flex-start;

    }

    .club-details h2 {
        font-size: 28px;
        margin-bottom: 10px;
        color: #333;
    }

    .club-details p {
        font-size: 16px;
        color: #555;
        line-height: 1.5;
    }

    /* 
    #club-events {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    } */

    h2 {
        font-size: 28px;
        color: #2d3e50;
        margin-bottom: 20px;
    }

    .event-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .event-item {
        background-color: #fffbbb;
        border-radius: 3px;
        padding: 10px 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.3s ease;
    }

    .event-item:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .event-item h3 {
        font-size: 22px;
        margin-bottom: 5px;
        color: #2d3e50;
    }

    .event-date {
        font-size: 16px;
        color: #555;
        margin-bottom: 10px;
    }


    /* Responsive Design */
    @media screen and (max-width: 768px) {
        .club-sidebar {
            /* width: 100%; */
            height: auto;
            position: fixed;
        }

        .club-info {
            flex-direction: column;
            text-align: center;
            align-items: center;
        }

        .club-info img {
            width: 120px;
            height: 120px;
        }
    }

    /* Gallery Section */
    #club-gallery {
        padding: 20px;
        background-color: #f9f9f9;
        /* Light background for contrast */
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        /* Adjust size as needed */
        gap: 15px;
        /* Space between items */
    }

    .gallery-item {
        overflow: hidden;
        /* Hide overflow to create a clean crop */
        position: relative;
        /* For hover effect */
        border-radius: 8px;
        /* Rounded corners */
    }

    .gallery-img {
        width: 100%;
        /* Make images responsive */
        height: 200px;
        /* Fixed height */
        object-fit: cover;
        /* Maintain aspect ratio while covering */
        transition: transform 0.3s ease;
        /* Smooth scaling on hover */
    }

    /* Hover effect */
    .gallery-img:hover {
        transform: scale(1.1);
        /* Scale up on hover */
    }

    /* Lightbox effect for larger image on click */
    .lightbox {
        display: none;
        /* Hidden by default */
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.8);
        /* Dark overlay */
        align-items: center;
        justify-content: center;
    }

    .lightbox img {
        max-width: 90%;
        /* Max width of the image */
        max-height: 90%;
        /* Max height of the image */
        border-radius: 8px;
        /* Rounded corners */
    }
</style>
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
            </div>
        </div>

    </div>

    <div class="toggle-sidebar">Menu</div>
    <div class="club-sidebar">
        <!-- <span class="close-btn" onclick="toggleSidebar()" style="cursor: pointer;">✖</span> -->
        <a onclick="showSection('club-home')">Home</a>
        <a onclick="showSection('club-events')">Events</a>
        <a onclick="showSection('club-gallery')">Gallery</a>
        <a onclick="showSection('club-contact')">Contact</a>
    </div>
</div>

<script>
    function showSection(sectionId) {
        // Hide all sections
        document.querySelectorAll('.tab-section').forEach(section => {
            section.classList.remove('active');
        });

        // Show the selected section
        document.getElementById(sectionId).classList.add('active');

        // toggleSidebar();
    }

    // function toggleSidebar() {
    //    const sidebar = document.querySelector('.club-sidebar');
    //    sidebar.style.transform = sidebar.style.transform === 'scaleX(1)' ? 'scaleX(0)' : 'scaleX(1)';
    //    const toggleBtn = document.querySelector('.toggle-sidebar');
    //    toggleBtn.style.display = toggleBtn.style.display === 'none' ? 'block' : 'none';
    // }
</script>

@endsection