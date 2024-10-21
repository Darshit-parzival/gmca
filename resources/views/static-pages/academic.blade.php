@extends('layouts.main')

@section('main-section')

<!--<script src='https://kit.fontawesome.com/a076d05399.js'></script>-->
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Academic</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="/">Home</a>
                            </li>
                            <li>Academic</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Event Area Start-->
<div class="event-area section-padding bg-white" style="padding-top: 50px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title" style="padding-bottom: 5px;">
                        <h3>What We Offer</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>



        <div class="single-comment">
            <div class="author-image">
                <!-- <i class="fa " aria-hidden="true"></i> -->
                <!--<span class='fas fa-graduation-cap' style='font-size:48px;color:orange'> </span>-->
                <svg xmlns="http://www.w3.org/2000/svg" style='color:orange' class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>
            </div>
            <div class="comment-text">
                <div class="author-info">
                    <h4><a href="{{ asset('assets/static/POs_new.pdf') }}" target="_blank">Program Outcome for MCA(POS)</a></h4>
                    <!--<span class="reply"><a href="#">Reply</a></span>-->
                    <!--<span class="comment-time">Posted on Jun 12, 2015 /</span>-->
                </div>
            </div>
        </div>


        <div class="single-comment">
            <div class="author-image">
                <!-- <i class="fa " aria-hidden="true"></i> -->
                <!--<span class='fas fa-graduation-cap' style='font-size:48px;color:orange'> </span>-->
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913z" />
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                </svg>
            </div>
            <div class="comment-text">
                <div class="author-info">
                    <h4><a href="{{ asset('assets/static/peo.pdf') }}" target="_blank">Program Educational Objectives (PEOs)</a></h4>
                    <!--<span class="reply"><a href="#">Reply</a></span>-->
                    <!--<span class="comment-time">Posted on Jun 12, 2015 /</span>-->
                </div>
            </div>
        </div>
        <div class="single-comment">
            <div class="author-image">
                <!--<span class='fas fa-user-cog' style='font-size:48px;color:orange'></span>-->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                </svg>
            </div>
            <div class="comment-text">
                <div class="author-info">
                    <!--<h4><a href="#">Student Startup and Innovation Cell</a></h4>-->
                    <h4>Student Startup and Innovation Cell</h4>
                    <!--<span class="reply"><a href="#">Reply</a></span>-->
                    <!--<span class="comment-time">Posted on Jun 12, 2015 /</span>-->
                </div>
                <p>Institute has active Student Startup and Innovation Cell. Projects are supported under State Student Startup Innovation Policy (SSIP) and Student Open Innovation Challenges (SOIC).</p>
            </div>
        </div>

        <div class="single-comment">
            <div class="author-image">
                <!--<span class='fas fa-university' style='font-size:48px; color:orange'> </span>-->
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24">
                    <path d="M21,10a.99974.99974,0,0,0,1-1V6a.9989.9989,0,0,0-.68359-.94824l-9-3a1.002,1.002,0,0,0-.63282,0l-9,3A.9989.9989,0,0,0,2,6V9a.99974.99974,0,0,0,1,1H4v7.18427A2.99507,2.99507,0,0,0,2,20v2a.99974.99974,0,0,0,1,1H21a.99974.99974,0,0,0,1-1V20a2.99507,2.99507,0,0,0-2-2.81573V10ZM20,21H4V20a1.001,1.001,0,0,1,1-1H19a1.001,1.001,0,0,1,1,1ZM6,17V10H8v7Zm4,0V10h4v7Zm6,0V10h2v7ZM4,8V6.7207l8-2.667,8,2.667V8Z" />
                </svg>
            </div>
            <div class="comment-text">
                <div class="author-info">
                    <!--<h4><a href="#">Training and Placement Cell</a></h4>-->
                    <h4>Training and Placement Cell</h4>
                    <!--<span class="reply"><a href="#">Reply</a></span>-->
                    <!--<span class="comment-time">Posted on Jun 12, 2015 /</span>-->
                </div>
                <p>Training and Placement Cell at GMCA organizes various training programs for students in the technical and non-technical domain for students' development. This cell also organizes placement related activities.</p>
            </div>
        </div>
        <div class="single-comment">
            <div class="author-image">
                <span class="zmdi zmdi-cloud" style="font-size:48px"> </span>
            </div>
            <div class="comment-text">
                <div class="author-info">
                    <h4><a href="#">Learning Resources</a></h4>
                    <!--<span class="reply"><a href="#">Reply</a></span>-->
                    <!--<span class="comment-time">Posted on Jun 12, 2015 /</span>-->
                </div>
                <p>Online learning platform is used to support teaching-learning and assessment.</p>

                <div class="author-info">
                    <h5><a href="http://vlabs.iitb.ac.in/vlab/" target="_blank">1) Virtual Lab</a></h5>
                    <h5><a href="https://teams.microsoft.com/" target="_blank">2) Microsoft Teams</a></h5>
                    <h5><a href="https://ekumbh.aicte-india.org/" target="_blank">3) AICTE e-KUMBH</a></h5>
                    <h5><a href="https://shodhganga.inflibnet.ac.in/" target="_blank">4) Shodhganga: a reservoir of Indian Theses</a></h5>
                </div>
            </div>
            <div class="single-comment">
                <div class="author-image">
                    <!--<span class="fas fa-calendar" style="font-size:48px;color:orange"> </span>-->
                    <svg xmlns="http://www.w3.org/2000/svg" height="60" width="60" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z" />
                    </svg>
                </div>
                <div class="comment-text">
                    <div class="author-info">
                        <h4><a href="#">Academic Calendar</a></h4><br>
                        <!--<span class="reply"><a href="#">Reply</a></span>-->
                        <!--<span class="comment-time">Posted on Jun 12, 2015 /</span>-->
                        <h5><a href="https://www.gtu.ac.in/AcademicCal.aspx" target="_blank">GTU Academic Calendar</a></h5>
                    </div>
                </div>
            </div>

            <div class="single-comment">
                <div class="author-image">
                    <!--<span class="fas fa-calendar" style="font-size:48px;color:orange"> </span>-->
                    <svg class="svg-snoweb svg-theme-light" width="300" height="300" viewbox="30 0 448 500" xmlns="http://www.w3.org/2000/svg">
                        <path class="svg-fill-primary" d="M52.3,15.3a4.3,4.3,0,0,0-4.6,0l-33,18.8A4.7,4.7,0,0,0,17,42.9v33a4.7,4.7,0,0,0-4.7,4.7A4.8,4.8,0,0,0,17,85.4H83a4.8,4.8,0,0,0,4.7-4.8A4.7,4.7,0,0,0,83,75.9v-33a4.7,4.7,0,0,0,2.3-8.8ZM31.1,47.6a4.8,4.8,0,0,0-4.7,4.8V66.5a4.7,4.7,0,0,0,4.7,4.7,4.8,4.8,0,0,0,4.8-4.7V52.4A4.9,4.9,0,0,0,31.1,47.6Zm14.2,4.8a4.7,4.7,0,1,1,9.4,0V66.5a4.7,4.7,0,0,1-9.4,0Zm23.6-4.8a4.9,4.9,0,0,0-4.8,4.8V66.5a4.8,4.8,0,0,0,4.8,4.7,4.7,4.7,0,0,0,4.7-4.7V52.4A4.8,4.8,0,0,0,68.9,47.6Z" fill-rule="evenodd">
                        </path>
                    </svg>
                </div>
                <div class="comment-text">
                    <div class="author-info">
                        <h4><a href="/library">Library</a></h4><br>
                        <!--<span class="reply"><a href="#">Reply</a></span>-->
                        <!--<span class="comment-time">Posted on Jun 12, 2015 /</span>-->
                        <h5><a href="/library"></a></h5>
                    </div>
                </div>
            </div>
            <div class="single-comment">
                <div class="author-image">
                    <!--<span class='fas fa-user-cog' style='font-size:48px;color:orange'></span>-->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg>
                </div>
                <div class="comment-text">
                    <div class="author-info">
                        <!--<h4><a href="#">Student Startup and Innovation Cell</a></h4>-->
                        <h4><a href="/student">Student Section</a></h4>
                        <!--<span class="reply"><a href="#">Reply</a></span>-->
                        <!--<span class="comment-time">Posted on Jun 12, 2015 /</span>-->
                    </div>
                    <p>The student section at GMCA College serves as the central administrative unit dedicated to managing various aspects & responsibilities crucial to student life and academic affairs</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection