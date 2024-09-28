@extends('layouts.main')

@section('main-section')

<style>
    body {
        font-family: 'montserratregular', sans-serif;
        margin: 0;
        padding: 0;
    }

    .clubs-container {
        width: 100%;
        text-align: center;
        margin-top: 10px;
        margin-bottom: 10px;
        padding: 20px;
    }

    .clubs-header {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 30px;
        color: #333;
    }

    .clubs {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 100px;
    }

    .club {
        width: 250px;
        text-align: center;
        transition: transform 0.3s ease-in-out;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .club:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .club img {
        width: 100%;
        max-width: 200px;
        height: auto;
        border-radius: 10px;
    }

    .club-title {
        font-weight: bold;
        margin-top: 15px;
        font-size: 18px;
        color: #555;
    }

    .club-subtitle {
        font-style: italic;
        font-weight: bold;
        margin-top: 5px;
        color: #777;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
        .clubs {
            flex-direction: column;
            gap: 10px;
        }

        .club {
            margin: 20px 0;
        }
    }
</style>

<div class="clubs-container">
    <div class="clubs-header">Student Clubs</div>
    <div class="clubs">
        <div class="club">
            <a href="/giyf">
                <img src="{{ asset('assets/static/iyf_logo.png') }}" alt="Ignited Youth Forum Logo">
            </a>
            <div class="club-title">GMCA</div>
            <div class="club-subtitle">Ignited Youth Forum</div>
        </div>
        <div class="club">
            <a href="/gcs">
                <img src="{{ asset('assets/static/cs_logo.png') }}" alt="Cyber Shield Logo">
            </a>
            <div class="club-title">GMCA</div>
            <div class="club-subtitle">Cyber Shield</div>
        </div>
    </div>
</div>

@endsection
