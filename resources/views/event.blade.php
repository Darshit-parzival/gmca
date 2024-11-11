@extends('layouts.main')

@section('main-section')


    <style>
        .nav-tabs {
            border-bottom: 2px solid #2d3e50;
            margin-bottom: 20px;
        }

        .nav-tabs>li>a {
            color: #2d3e50;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 4px 4px 0 0;
        }

        .nav-tabs>li.active>a {
            background-color: #2d3e50 !important;
            color: #fff !important;
        }

        .nav-tabs>li>a:hover {
            background-color: #576473;
            color: #fff;
        }

        .event-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            display: flex;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .event-card:hover {
            transform: scale(1.02);
        }

        .event-date {
            background-color: #2d3e50;
            color: #fff;
            padding: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 80px;
        }

        .event-date .date-day {
            font-size: 24px;
            font-weight: bold;
        }

        .event-date .date-month {
            font-size: 14px;
        }

        .event-date .date-year {
            font-size: 12px;
        }

        .event-content {
            padding: 15px;
            flex: 1;
        }

        .event-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .event-details {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .pdf-icon {
            text-align: right;
        }

        .pdf-icon a {
            color: #d9534f;
            font-size: 24px;
            text-decoration: none;
        }

        .pdf-icon a:hover {
            color: #c9302c;
        }

        .tab-pane {
            display: none;

        }

        .tab-pane.active {
            display: block;
            /* Show the active tab pane */
        }
    </style>



    <!--Breadcrumb Banner Area Start-->

    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#all" data-toggle="tab">All</a></li>
            <li><a href="#college-events" data-toggle="tab">College Events</a></li>
            <li><a href="#ignited-youth-forum" data-toggle="tab">Ignited Youth Forum Events</a></li>
            <li><a href="#cyber-shields" data-toggle="tab">Cyber Shields Events</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="all" class="tab-pane fade in active">
                @foreach ($events as $event)
                    <div class="event-card">
                        <div class="event-date">
                            <span class="date-day">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                            <span class="date-month">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                            <span class="date-year">{{ \Carbon\Carbon::parse($event->date)->format('Y') }}</span>
                        </div>
                        <div class="event-content">
                            <h4 class="event-title">{{ $event->name }}</h4>
                            <p class="event-details">{{ $event->details }}</p>
                            @if ($event->report)
                                <div class="pdf-icon">
                                    <a href="{{ asset('assets/admin/reports' . '/' . $event->report) }}" target="_blank">
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>


            <div id="college-events" class="tab-pane fade">
                @php
                    $collegeEvents = $events->where('type', 'ce');
                @endphp
                <div class="row">
                    @if ($collegeEvents->isNotEmpty())
                        @foreach ($collegeEvents as $event)
                            <div class="event-card">
                                <div class="event-date">
                                    <span class="date-day">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                    <span class="date-month">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                    <span class="date-year">{{ \Carbon\Carbon::parse($event->date)->format('Y') }}</span>
                                </div>
                                <div class="event-content">
                                    <h4 class="event-title">{{ $event->name }}</h4>
                                    <p class="event-details">{{ $event->details }}</p>
                                    @if ($event->report)
                                        <div class="pdf-icon">
                                            <a href="{{ asset('assets/admin/reports' . '/' . $event->report) }}"
                                                target="_blank">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No events available.</p>
                    @endif
                </div>
            </div>


            <div id="ignited-youth-forum" class="tab-pane fade">
                @php
                    $iyfeEvents = $events->where('type', 'iyfe');
                @endphp
                <div class="row">
                    @if ($iyfeEvents->isNotEmpty())
                        @foreach ($iyfeEvents as $event)
                            <div class="event-card">
                                <div class="event-date">
                                    <span class="date-day">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                    <span class="date-month">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                    <span class="date-year">{{ \Carbon\Carbon::parse($event->date)->format('Y') }}</span>
                                </div>
                                <div class="event-content">
                                    <h4 class="event-title">{{ $event->name }}</h4>
                                    <p class="event-details">{{ $event->details }}</p>
                                    @if ($event->report)
                                        <div class="pdf-icon">
                                            <a href="{{ asset('assets/admin/reports' . '/' . $event->report) }}"
                                                target="_blank">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No events available.</p>
                    @endif
                </div>
            </div>


            <div id="cyber-shields" class="tab-pane fade">
                @php
                    $cseEvents = $events->where('type', 'cse');
                @endphp

                <div class="row">
                    @if ($cseEvents->isNotEmpty())
                        @foreach ($cseEvents as $event)
                            <div class="event-card">
                                <div class="event-date">
                                    <span class="date-day">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                                    <span class="date-month">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                                    <span class="date-year">{{ \Carbon\Carbon::parse($event->date)->format('Y') }}</span>
                                </div>
                                <div class="event-content">
                                    <h4 class="event-title">{{ $event->name }}</h4>
                                    <p class="event-details">{{ $event->details }}</p>
                                    @if ($event->report)
                                        <div class="pdf-icon">
                                            <a href="{{ asset('assets/admin/reports' . '/' . $event->report) }}"
                                                target="_blank">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No events available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.nav-tabs a').click(function(e) {
                e.preventDefault();
                // $(this).tab('show');

                // Hide all tab panes
                $('.tab-pane').removeClass('active');

                // Show the clicked tab pane
                $($(this).attr('href')).addClass('active');
            });

            // Activate the first tab by default
            // $('.nav-tabs li:first-child a').click();
        });
    </script>

@endsection
