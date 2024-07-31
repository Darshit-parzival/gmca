@extends('layouts.main')

@section('main-section')
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">News</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="/">Home</a>
                                </li>
                                <li>News</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Latest News Area Start-->
    <div class="latest-area bg-white" style="padding-top: 50px;padding-bottom: 20px;">
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
                                Title
                            </h3>
                            <div class="single-item-comment-view">
                                <span><i class="zmdi zmdi-calendar-check"></i>Date</span>
                            </div>
                            <a href='1.pdf' target=_blank> Click Here For Download </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
