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
    </style>

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
                        <img src="{{ asset('/assets/admin/images/slider/' . $item->webportal_file) }}" alt="alt">
                        <div class="carousel-caption">
                            <h1 class="title1">{{ $item->webportal_title }}</h1>
                            <p style="font-size: 20px;">{{ $item->webportal_details }}</p>
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
                            Government MCA college Maninagar, Ahmedabad is the first Government MCA College in Gujarat. It
                            was established in June 2012 with facilities to run Master of Computer Application. In the year
                            2012, course was introduced with an intake of 60 students. The college has well-established
                            Central Learning resource centers like Central library, Central Computer Centre,
                            Entrepreneurship Development Cell, Continuing Education Centre and Physical Education Section.
                        </p>
                        <a class="button-default" href="/about">More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-area bg-white" style="padding-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Latest News</h3>
                            <p>GMCA organizes many training programs for students, faculty members, and industrial persona
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="single-latest-item">
                        <div class="single-latest-text">
                            <h3>
                                News Title
                            </h3>
                            <div class="single-item-comment-view">
                                <span><i class="zmdi zmdi-calendar-check"></i>Date</span>
                            </div>
                            <a href='1.pdf' target=_blank> Click Here For Download </a>
                        </div>
                    </div>
                </div>

            </div>
            <a class="button-default" href="/news">Read All News</a>

            <!-- Notice --><!--
                <div class="latest-area bg-white">
                    <div class="container"> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Latest Notice</h3>
                            <p>GMCA organizes many training programs for students, faculty members, and industrial persona
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!--  Notice   -->
                <div class="col-md-12 col-sm-12">
                    <div class="single-latest-item">
                        <div class="single-latest-text" style="height: 200px;">
                            <marquee direction="up" scrollamount="2" onmouseover="stop()"; onmouseout="start();">
                                <h4>
                                    <a href='2.pdf' target=_blank>Notices</a>
                                </h4>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div><a class="button-default" href="/notice">View All Notice </a>
        </div>
    </div>

    <!--End of Latest News Area-->
    <!--Fun Factor Area Start-->
    <div class="fun-factor-area" style="padding: 0px;">
        <div class="container">
            <div class="row" style="margin-bottom: 25px;">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class= "section-title-wrapper white" style="margin-top: 10px;margin-bottom:36px;">
                            <div class="section-title">
                                <h1>GMCA Vision</h1>
                            </div>
                        </div>
                        <p style=" text-align: justify;">
                        <ul>
                            <li>Provide value-based quality education for computer science applications which enable students to solve real-life problems of society.</li>
                            <li><br />
                                <a href="assets/pdf/Vision Document GMCA.pdf" class="text-white vis" target="_blank"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-paperclip" viewBox="0 0 16 16">
                                        <path
                                            d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0z" />
                                    </svg>Vision Document of GMCA</a>
                            </li>
                        </ul>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <div class="section-title-wrapper white" style="margin-top: 10px;margin-bottom:36px;">
                            <div class="section-title">
                                <h1>GMCA Mission</h1>
                            </div>
                        </div>
                        <div style=" text-align: justify;">
                            <ul>
                                <li> To equip our students with good knowledge, skills and attitude to solve real-life
                                    problems in the domain of computer applications.</li>
                                <li> <br> To establish industry-academia interaction to facilitate the students to work
                                    proficiently in the industrial environment.</li>
                                <li> <br> To imbibe high moral values and professional ethics.</li>
                                <li> <br> To provide a conducive environment so as to achieve excellence in
                                    teaching-learning, and research and development activities.</li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--End of Fun Factor Area-->
    <!--Footer Area Start-->
    <div style="height: 50px;">
    </div>
@endsection
