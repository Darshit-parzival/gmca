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
            <div class="row d-flex flex-wrap">
                @foreach ($news_data as $news)
                    <div class="col-md-3 d-flex">
                        <div class="single-latest-item w-100">
                            <div class="single-latest-text">
                                <h3>{{ $news->title }}</h3>
                                <div class="single-item-comment-view">
                                    <span><i class="zmdi zmdi-calendar-check"></i>
                                        {{ $news->updated_at->format('d M Y') }}</span>
                                </div>
                                @if (!empty($news->report))
                                    <a href="{{ asset('assets/admin/news_reports/' . $news->report) }}"
                                        target="_blank">Click Here For Download</a>
                                @else
                                    <p>No file available for download</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
