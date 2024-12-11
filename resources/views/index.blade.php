@extends('layouts.main')

@section('main-section')
    <style>
        .carousel-inner .item img {
            width: 100%;
            height: 600px;
            object-fit: cover;
        }

        .carousel-caption {
            background-color: black;
            opacity: 0.7;
            color: white;
            padding: 20px;
        }

        .vis {
            text-decoration: underline;
        }

        .vis:hover {
            color: #6d7d90 !important;
        }

        .modal-content {
            transform: scale(0);
            /* Initially scaled down */
            transition: all 0.6s cubic-bezier(.28, .05, .67, 1.87) 0s !important
                /* Smooth transition for transform property */
        }

        .modal-content.modal-active {
            transform: scale(1);
            /* Scale up to full size when .modal-active is added */
        }
        .row.d-flex {
    display: flex;
    flex-wrap: wrap;
    /* gap: 20px; */
}

.col-md-3 {
    display: flex; /* Ensures all columns stretch equally */
    flex-direction: column;
}

.single-latest-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Ensures content is distributed evenly */
    height: 100%; /* Matches the height of other cards */
    background: #f9f9f9; /* Optional background styling */
    border: 1px solid #ddd; /* Optional border for better visibility */
    /*padding: 15px;*/
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional shadow effect */
}

    </style>


    <body class="no-scroll">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @php
                    $active = false;
                @endphp
                @foreach ($webportal_datas as $index => $item)
                    @if ($item->webportal_status === 1)
                        <div class="item {{ !$active ? 'active' : '' }}">
                            @php
                                $active = true;
                            @endphp
                            <img src="{{ asset('/public/assets/admin/images/slider/' . $item->webportal_file) }}" alt="alt">
                            <div class="carousel-caption">
                                <h1 class="title1">{{ $item->webportal_title }}</h1>
                                <p style="font-size: 20px;" class="text-center">{{ $item->webportal_details }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                @if (!$active)
                    <div class="item active">
                        <p>No slides available</p>
                    </div>
                @endif
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Button trigger modal -->

        <!--End of Slider Area-->
        <!--About Area Start-->
        <div class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="about-container">
                            <h3>About GMCA</h3>
                            <p style=" text-align: justify;font-size: 15px;">
                                Government MCA college Maninagar, Ahmedabad is the first Government MCA College in Gujarat.
                                It
                                was established in June 2012 with facilities to run Master of Computer Application. In the
                                year
                                2012, course was introduced with an intake of 60 students. The college has well-established
                                Central Learning resource centers like Central library, Central Computer Centre,
                                Entrepreneurship Development Cell, Continuing Education Centre and Physical Education
                                Section.
                            </p>
                            <a class="button-default" href="/about">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="news"></div>
        <div class="latest-area bg-white" style="padding-top: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-wrapper">
                            <div class="section-title">
                                <h3>Latest News</h3>
                                <p>GMCA organizes many training programs for students, faculty members, and industrial
                                    persona
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex flex-wrap">
    @foreach ($news_data as $news)
        <div class="col-md-3 d-flex">
            <div class="single-latest-item w-100">
                <div class="single-latest-text" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                    <h3>{{ $news->title }}</h3>
                    <div class="single-item-comment-view">
                        <span><i class="zmdi zmdi-calendar-check"></i>
                            {{ $news->updated_at->format('d M Y') }}</span>
                    </div>
                    @if (!empty($news->report))
                        <a href="{{ asset('public/assets/admin/news_reports/' . $news->report) }}" target="_blank">Click Here For Download</a>
                    @else
                        <p>No file available for download</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

                <a class="button-default" href="/news">Read All News</a>
                <div id="notice"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-wrapper">
                            <div class="section-title">
                                <h3>Latest Notice</h3>
                                <p>GMCA organizes many training programs for students, faculty members, and industrial
                                    persona
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!--  Notice   -->
                    <div class="col-md-12 col-sm-12">
                        <div class="single-latest-item">
                            <div class="single-latest-text" style="height: 200px; overflow: hidden; position: relative;">
                                <div class="notice-scroll">
                                    @foreach ($notice_data as $notice)
                                        <div class="notice-item mb-3">
                                            <h4><a href="{{ asset('public/assets/admin/news_reports/' . $notice->report) }}" target="_blank">{{ $notice->title }}</a></h4>
                                            <p>{{ $notice->details }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div><a class="button-default mt-3" href="/notice">View All Notice </a>
            </div>
        </div>

        <!--End of Latest News Area-->
        <!--Fun Factor Area Start-->
        <div class="fun-factor-area" style="padding: 0px;">
            <div class="container">
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="section-title-wrapper white" style="margin-top: 10px;margin-bottom:36px;">
                                <div class="section-title">
                                    <h1>GMCA Vision</h1>
                                </div>
                            </div>
                            @if ($vision_data && !empty($vision_data->webportal_details))
                                <ul>
                                    <p>{!! nl2br(e($vision_data->webportal_details)) !!}</p>

                                    @if (!empty($vision_data->webportal_file))
                                        <li class="mt-3">
                                            <a href="{{ asset('public/assets/admin/static/vision/' . $vision_data->webportal_file) }}"
                                                target="_blank" class="text-white vis">
                                                <i class="mdi mdi-paperclip"></i> Vision Document
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            @else
                                <p>No data available</p>
                            @endif

                        </div>

                        <div class="col-md-6">
                            <div class="section-title-wrapper white" style="margin-top: 10px; margin-bottom:36px;">
                                <div class="section-title">
                                    <h1>GMCA Mission</h1>
                                </div>
                            </div>
                            <div style=" text-align: justify;">
                                @if ($mission_data && !empty($mission_data->webportal_details))
                                    <ul>
                                        <p>{!! nl2br(e($mission_data->webportal_details)) !!}</p>
                                        @if (!empty($mission_data->webportal_file))
                                            <li class="mt-3">
                                                <a href="{{ asset('public/assets/admin/static/mission/' . $mission_data->webportal_file) }}"
                                                    target="_blank" class="text-white vis"><i class="mdi mdi-paperclip"></i>
                                                    Mission Document</a>
                                            </li>
                                        @endif
                                    </ul>
                                @else
                                    <p>No data available</p>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div id="visionMissionModal" class="modal">
            <div class="modal-content" id="modal-content">
                <div class="popup-logo">
                    <img src="{{ asset('public/assets/static/logo_with_name.png') }}" alt="">
                </div>
                <span class="mdi mdi-close close"></span>
                <h4>Our Vision</h4>
                @if ($vision_data && !empty($vision_data->webportal_details))
                    <ul>
                        @foreach (explode("\n", $vision_data->webportal_details) as $point)
                            @if (!empty(trim($point)))
                                <li>{{ $point }}</li>
                            @endif
                        @endforeach
                        @if (!empty($vision_data->webportal_file))
                            <li>
                                <a href="{{ asset('public/assets/admin/static/vision/' . $vision_data->webportal_file) }}"
                                    target="_blank" class="img-fluid mb-3"><i class="mdi mdi-paperclip"></i>
                                    Vision Document</a>
                            </li>
                        @endif
                    </ul>
                @else
                    <p>No data available</p>
                @endif

                <h4>Our Mission</h4>
                @if ($mission_data && !empty($mission_data->webportal_details))
                    <ul>
                        @foreach (explode("\n", $mission_data->webportal_details) as $point)
                            @if (!empty(trim($point)))
                                <li>{{ $point }}</li>
                            @endif
                        @endforeach
                        @if (!empty($mission_data->webportal_file))
                            <li>
                                <a href="{{ asset('public/assets/admin/static/mission/' . $mission_data->webportal_file) }}"
                                    target="_blank" class="img-fluid mb-3"><i class="mdi mdi-paperclip"></i>
                                    Mission Document</a>
                            </li>
                        @endif
                    </ul>
                @else
                    <p>No data available</p>
                @endif
            </div>
        </div>
        <script>
            // Get the modal
            var modal = document.getElementById("visionMissionModal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            if (window.location.href.includes('news')) {
                const newsDiv = document.getElementById('news');
                if (newsDiv) {
                    newsDiv.scrollIntoView();
                    document.body.classList.remove('no-scroll');
                }
            }

            if (window.location.href.includes('notice')) {
                const noticeDiv = document.getElementById('notice');
                if (noticeDiv) {
                    noticeDiv.scrollIntoView();
                    document.body.classList.remove('no-scroll');
                }
            }

            function checkURLForModal() {
                if (window.location.href.includes('vm')) {
                    const modalDiv = document.getElementById("visionMissionModal");
                    const modalCont = document.getElementById("modal-content");
                    const headerDiv = document.getElementsByClassName("sticker");

                    if (modalDiv) {
                        modalDiv.style.display = "block";
                        headerDiv[0].style.display = "none";
                        setTimeout(() => {
                            modalCont.classList.add('modal-active');
                        }, 1);
                        document.body.classList.add('no-scroll');
                    }
                }
            }

            // Check initially
            checkURLForModal();

            // Listen for changes in the URL hash
            window.addEventListener('hashchange', checkURLForModal);

            // Show the modal when the page loads
            window.onload = function() {
                if (window.location.href.includes('news') || window.location.href.includes('notice')) {
                    return;
                }
                if (sessionStorage.getItem('visited')) {
                    document.body.classList.remove('no-scroll');
                    return;
                }
                document.body.classList.add('no-scroll');
                modal.style.display = "block";
                setTimeout(() => {
                    document.getElementById('modal-content').classList.add('modal-active');
                }, 1);

                if (!sessionStorage.getItem('visited')) {
                    sessionStorage.setItem('visited', 'true');
                }
            };

            span.onclick = function() {
                window.location.hash = '';
                document.getElementById('modal-content').classList.remove('modal-active');
                setTimeout(() => {
                    modal.style.display = "none";
                }, 300);
                document.body.classList.remove('no-scroll'); // Enable scrolling
                const headerDiv = document.getElementsByClassName("sticker");
                headerDiv[0].style.display = "block";
            };

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    window.location.hash = '';
                    document.getElementById('modal-content').classList.remove('modal-active');
                    setTimeout(() => {
                        modal.style.display = "none";
                    }, 300);
                    document.body.classList.remove('no-scroll'); // Enable scrolling
                    const headerDiv = document.getElementsByClassName("sticker");
                    headerDiv[0].style.display = "block";
                }
            };
        </script>
        <!--End of Fun Factor Area-->
        <!--Footer Area Start-->
        <div style="height: 50px;">
        </div>
    </body>
@endsection
