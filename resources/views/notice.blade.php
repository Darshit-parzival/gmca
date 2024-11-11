@extends('layouts.main')

@section('main-section')
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Notice</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="/">Home</a>
                                </li>
                                <li>Notice</li>
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
                            <h3>Latest Notice</h3>
                            <p>GMCA organizes many training programs for students, faculty members, and industrial persona
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="single-latest-text" style="height: 200px; overflow: hidden; position: relative;">
                    <div class="notice-scroll">
                        @foreach ($notice_data as $notice)
                            <div class="notice-item mb-3">
                                <h4><a href="{{ asset('assets/admin/news_reports/' . $notice->report) }}"
                                        target="_blank">{{ $notice->title }}</a></h4>
                                <p>{{ $notice->details }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
