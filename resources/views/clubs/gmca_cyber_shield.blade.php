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
        background-color: #333;
        height: auto;
        padding: 20px;
        box-sizing: border-box;
    }

    .club-sidebar a {
        display: block;
        color: white;
        text-decoration: none;
        padding: 10px;
        margin: 10px 0;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    .club-sidebar a:hover {
        background-color: #444;
    }

    .club-content {
        width: calc(100% - 250px);
        padding: 20px;
        flex-grow: 1;
    }

    .club-info {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-top: 50px;
    }

    .club-info img {
        width: 300px;
        border-radius: 10px;
    }

    .club-details {
        flex-grow: 1;
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

    /* Responsive Design */
    @media screen and (max-width: 768px) {
        .club-sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        .content {
            margin-left: 0;
        }
        .club-info {
            flex-direction: column;
            text-align: center;
        }
        .club-info img {
            width: 120px;
            height: 120px;
        }
    }
</style>
<div class="club-container">

    <div class="club-content">
        <div class="club-info">
            <img src="{{ asset('assets/static/cs_logo.png') }}" alt="Cyber Shield Logo">
            <div class="club-details">
                <h2>Cyber Shield</h2>
                <p>Cyber Shield (GMCA) is dedicated to promoting cybersecurity awareness, knowledge sharing, and skill development in the field of cybersecurity. As technology advances, protecting data and information becomes more crucial than ever, and Cyber Shield is at the forefront of this mission.</p>
                <p>Our club hosts various workshops, events, and hands-on training sessions to help students stay ahead in cybersecurity trends. Join us to enhance your skills, understand the challenges of the digital world, and be a part of the future defenders of cyber safety.</p>
            </div>
        </div>
    </div>
    
    <div class="club-sidebar">
        <a href="#">Home</a>
        <a href="#">Events</a>
        <a href="#">Gallery</a>
        <a href="#">Contact</a>
    </div>
</div>

@endsection