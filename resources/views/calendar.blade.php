@extends('layouts.main')

@section('main-section')
    <style>
        .collapsible {
            background-color: #f1f1f1;
            color: #444;
            cursor: pointer;
            padding: 10px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }

        .collapsible.active {
            background-color: #ccc;
        }

        .toggle-icon {
            font-weight: bold;
            font-size: 18px;
            margin-left: 10px;
        }

        .content {
            visibility: hidden;
            overflow: hidden;
            background-color: #f9f9f9;
            padding: 0 15px;
            margin-top: 10px;
            transition: max-height 0.3s ease, opacity 0.3s ease, visibility 0.3s ease;
            opacity: 0;
            max-height: 0;
        }

        .content.show {
            visibility: visible;
            max-height: 500px;
            /* or any large enough value */
            opacity: 1;
        }

        .content ul {
            list-style-type: none;
            padding: 0;
        }

        .content ul li {
            margin-bottom: 5px;
        }

        .content ul li a {
            color: #007bff;
            text-decoration: none;
        }

        .content ul li a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Academic Calendar</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="/">Home</a></li>
                                <li>Academic Calendar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Left Column: University -->
            <div class="col-md-6">
                <div class="calendar-section">
                    <h3 class="text-center">University</h3>

                    <!-- University Odd Term -->
                    <button type="button" class="collapsible">
                        Odd Term <span class="toggle-icon">+</span>
                    </button>
                    <div class="content mb-3" style="display: none;">
                        @foreach ($calendar_data->where('is_university', true)->where('is_odd_term', true) as $calendar)
                            <ul>
                                <li><a href="{{ asset('assets/admin/files/calendars/' . $calendar->file) }}"
                                        target="_blank">{{ $calendar->calendar_name }}</a></li>
                            </ul>
                        @endforeach
                    </div>

                    <!-- University Even Term -->
                    <button type="button" class="collapsible">
                        Even Term <span class="toggle-icon">+</span>
                    </button>
                    <div class="content mb-3" style="display: none;">
                        @foreach ($calendar_data->where('is_university', true)->where('is_even_term', true) as $calendar)
                            <ul>
                                <li><a href="{{ asset('assets/admin/files/calendars/' . $calendar->file) }}"
                                        target="_blank">{{ $calendar->calendar_name }}</a></li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="col-md-1 d-flex justify-content-center align-items-center">
                <div style="width: 1px; height: 100%; background-color: #ccc;"></div>
            </div>

            <!-- Right Column: Institute -->
            <div class="col-md-5">
                <div class="calendar-section">
                    <h3 class="text-center">Institute</h3>

                    <!-- Institute Odd Term -->
                    <button type="button" class="collapsible">
                        Odd Term <span class="toggle-icon">+</span>
                    </button>
                    <div class="content mb-3" style="display: none;">
                        @foreach ($calendar_data->where('is_institute', true)->where('is_odd_term', true) as $calendar)
                            <ul>
                                <li><a href="{{ asset('assets/admin/files/calendars/' . $calendar->file) }}"
                                        target="_blank">{{ $calendar->calendar_name }}</a></li>
                            </ul>
                        @endforeach
                    </div>

                    <!-- Institute Even Term -->
                    <button type="button" class="collapsible">
                        Even Term <span class="toggle-icon">+</span>
                    </button>
                    <div class="content mb-3" style="display: none;">
                        @foreach ($calendar_data->where('is_institute', true)->where('is_even_term', true) as $calendar)
                            <ul>
                                <li><a href="{{ asset('assets/admin/files/calendars/' . $calendar->file) }}"
                                        target="_blank">{{ $calendar->calendar_name }}</a></li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Collapsible -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const collapsibles = document.querySelectorAll('.collapsible');

            collapsibles.forEach(button => {
                button.addEventListener('click', function() {
                    this.classList.toggle('active');

                    const content = this.nextElementSibling;
                    content.classList.toggle('show');

                    const icon = this.querySelector('.toggle-icon');
                    icon.textContent = content.classList.contains('show') ? '-' : '+';
                });
            });
        });
    </script>
@endsection
