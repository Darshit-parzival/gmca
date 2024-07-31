@extends('layouts.main')

@section('main-section')
    <style>
        .abtimg {
            /* background: url(asset('assets/static/gmca_photo.jpg')); */
            height: 400px;
            width: 100%;
        }
    </style>
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">ABOUT US</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="/">Home</a></li>
                                <li>ABOUT US</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->
    <!--About Page Area Start-->
    <div class="about-page-area section-padding" style="padding-top: 50px;padding-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-wrapper">
                        <div class="section-title">
                            <h3>Who we are</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text-container"
                        style="font-family: Poppins ,sans-serif; color: #5e5e5e; font-weight: 500; font-size: 17px; line-height: 25px; ">

                        <p style="text-align: justify;">
                            <span style="font-size: 17px;"><b> Government MCA College (Maninagar)</b></span> helps students
                            realize their potential for growth and success through innovative instruction in a nurturing,
                            diverse environment. Students achieve their career and personal goals, strengthening the
                            region's social and economic vibrancy. Strong local and global partnerships with business,
                            industry, labor and the public make the college a respected contributor to community vitality.

                        <p style="text-align: justify;"> Government MCA college Maninagar, Ahmedabad is the first Government
                            MCA College in Gujarat. It was established in June 2012 with facilities to run Master of
                            Computer Application. In the year 2012, course was introduced with an intake of 60 students. The
                            college has well-established Central Learning resource centers like Central library, Central
                            Computer Centre, Entrepreneurship Development Cell, Continuing Education Centre and Physical
                            Education Section.</p>

                        <p style="text-align: justify;">The college also has a very active Training & Placement section. The
                            college has a campus of its own, spread over 1.132 acre. The college has a Cafeteria, common
                            room for girls and boys, a Students Store, and play ground for some of the major games, viz.
                            Football, Basketball, Volleyball and Cricket.</p>

                        <p style="text-align: justify;"> Institute is well established with nicely designed, spacious Class
                            Rooms. Classrooms are available to facilitate teaching-learning process. These trendy class
                            rooms have comfortable seating arrangements with all modern teaching aids like LCD Projector and
                            VCD players.
                        </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="skill-image">
                        <!--<div class="abtimg"></div>-->
                        <img src="{{asset('assets/static/gmca_photo.jpg')}}" id='abtimg' alt="GMCA">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
