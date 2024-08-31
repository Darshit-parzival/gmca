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
    transform: scale(0); /* Initially scaled down */
    transition: all 0.6s cubic-bezier(.28,.05,.67,1.87) 0s !important /* Smooth transition for transform property */
}

.modal-content.modal-active {
    transform: scale(1); /* Scale up to full size when .modal-active is added */
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
                        <div class="single-latest-text" style="height: 200px;">
                            <marquee direction="up" scrollamount="2" onmouseover="stop()" ; onmouseout="start();">
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
                        <div class="section-title-wrapper white" style="margin-top: 10px;margin-bottom:36px;">
                            <div class="section-title">
                                <h1>GMCA Vision</h1>
                            </div>
                        </div>
                        <p style=" text-align: justify;">
                        <ul>
                            <li>Provide value-based quality education for computer science applications which enable
                                students to solve real-life problems of society.</li>
                            <li><br />
                                <a href="assets/pdf/Vision Document GMCA.pdf" class="text-white vis"
                                    target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
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

    <div id="visionMissionModal" class="modal">
        <div class="modal-content" id="modal-content">
            <div class="popup-logo">
                <img src="{{asset('assets/static/logo_with_name.png')}}" alt="">
            </div>
            <span class="mdi mdi-close close"></span>
            <h4>Our Vision</h4>
            <ul>
                <li>
                    <p>Provide value-based quality education for computer science applications which enable students to
                        solve real-life problems of society.</p>
                </li>
                <li>
                    <a href="{{asset('assets/static/dummy.pdf')}}" target="_blank"><i class="mdi mdi-paperclip"></i>
                        Vision Document</a>
                </li>
            </ul>
            <h4>Our Mission</h4>
            <ul>
                <li>
                    <p> To equip our students with good knowledge, skills and attitude to solve real-life problems in
                        the domain of computer applications.</p>
                </li>
                <li>
                    <p> To establish industry-academia interaction to facilitate the students to work proficiently in
                        the industrial environment. To imbibe high moral values and professional ethics.</p>
                </li>
                <li>
                    <p> To establish industry-academia interaction to facilitate the students to work proficiently in
                        the industrial environment.</p>
                </li>
                <li>
                    <p> To provide a conducive environment so as to achieve excellence in teaching-learning, and
                        research and development activities.</p>
                </li>
                <li>
                    <a href="{{asset('assets/static/dummy.pdf')}}" target="_blank"><i class="mdi mdi-paperclip"></i>
                        Mission Document</a>
                </li>
            </ul>
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
            }
        }

        if (window.location.href.includes('notice')) {
            const noticeDiv = document.getElementById('notice');
            if (noticeDiv) {
                noticeDiv.scrollIntoView();
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
        window.onload = function () {
            if(window.location.href.includes('news') || window.location.href.includes('notice')) {
                return;
            }
            if (sessionStorage.getItem('visited')) {
                document.body.classList.remove('no-scroll');
                return;
            }
            document.body.classList.add('no-scroll'); // Disable scrolling
            modal.style.display = "block";
            setTimeout(() => {
                document.getElementById('modal-content').classList.add('modal-active');
            }, 1);
            
            if (!sessionStorage.getItem('visited')) {
                sessionStorage.setItem('visited', 'true');
            }
        };

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
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
        window.onclick = function (event) {
            if (event.target == modal) {
                window.location.hash = '';
                document.getElementById('modal-content').classList.remove('modal-active');
                setTimeout(() => {
                    modal.style.display = "none";
                }, 300);
                document.body.classList.remove('no-scroll');  // Enable scrolling
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