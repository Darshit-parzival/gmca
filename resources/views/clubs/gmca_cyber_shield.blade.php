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
        /* Above the sidebar */
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
        /* Hide all sections initially */
    }

    .tab-section.active {
        display: block;
        /* Show the active section */
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
</style>

<div class="club-container">
    <div class="club-content">
        <!-- Home Section -->
        <div class="club-info">
            <img src="{{ asset('assets/static/cs_logo.png') }}" alt="Ignited Youth Forum Logo">
            <div class="club-details">
                <h2>Cyber Shield</h2>
                <div id="club-home" class="tab-section active">
                    <p>Cyber Shield (GMCA) is dedicated to promoting cybersecurity awareness, knowledge sharing, and skill development in the field of cybersecurity. As technology advances, protecting data and information becomes more crucial than ever, and Cyber Shield is at the forefront of this mission.</p>
                    <p>Our club hosts various workshops, events, and hands-on training sessions to help students stay ahead in cybersecurity trends. Join us to enhance your skills, understand the challenges of the digital world, and be a part of the future defenders of cyber safety.</p>
                </div>

                <!-- Events Section -->
                <div id="club-events" class="tab-section">
                    <h2>Events</h2>
                    <div class="event-list">
                        <div class="event-item">
                            <h3>Leadership Workshop</h3>
                            <p class="event-date">Sept 30, 2024</p>
                        </div>
                        <div class="event-item">
                            <h3>Community Service Project</h3>
                            <p class="event-date">Oct 15, 2024</p>
                        </div>
                        <div class="event-item">
                            <h3>Annual Youth Conference</h3>
                            <p class="event-date">Nov 10, 2024</p>
                        </div>
                    </div>
                </div>

                <!-- Gallery Section -->
                <div id="club-gallery" class="tab-section">
                    <h2>Event Gallery</h2>
                    <img src="{{ asset('assets/admin/images/events/1722791025_img1.jpg') }}" alt="Event 1">
                    <img src="{{ asset('assets/admin/images/events/1722791025_img2.jpg') }}" alt="Event 1">
                    <img src="{{ asset('assets/admin/images/events/1722791025_img3.jpg') }}" alt="Event 1">
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

    <div class="toggle-sidebar" onclick="toggleSidebar()">Menu</div>
    <div class="club-sidebar">
        <span class="close-btn" onclick="toggleSidebar()" style="cursor: pointer;">✖</span>
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

        toggleSidebar();
    }

    function toggleSidebar() {
        const sidebar = document.querySelector('.club-sidebar');
        sidebar.style.transform = sidebar.style.transform === 'scaleX(1)' ? 'scaleX(0)' : 'scaleX(1)';
        const toggleBtn = document.querySelector('.toggle-sidebar');
        toggleBtn.style.display = toggleBtn.style.display === 'none' ? 'block' : 'none';
        
    }
</script>

@endsection