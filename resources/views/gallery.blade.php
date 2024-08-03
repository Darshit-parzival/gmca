@extends('layouts.main')

@section('main-section')
    <style>
        /* .fancybox-container fancybox-is-open fancybox-can-swipe{
            header-logo-menu sticker stick
         */
        /* .zoom {
          padding: 50px;
          background-color: green;
          transition: transform .2s; Animation
          width: 200px;
          height: 200px;
          margin: 0 auto;
        }
        
        .zoom:hover {
          transform: scale(1.5);
           (150% zoom)
           
        } */
        .social-icons a {
            padding: 6px;
        }

        html {
            overflow-x: hidden;
            width: 100%;
        }

        .fancybox-container {
            z-index: 99999999999999999999999 !important;
        }

        .nav>li>a {
            color: #555;
        }

        .nav>li>a:hover {
            text-decoration: none;
            /* color: #555; */
            /* background-color: white !important; */
            color: white;
            background-color: #2e3e50 !important;
            transition: 0.9s;
        }

        .comp-view {
            display: flex;
        }

        .mob-view {
            display: none;
            width: 100%;
        }

        @media (max-width : 991px) {
            .comp-view {
                display: none;
            }

            .mob-view {
                width: 100%;
                display: flex;
            }
        }

        .topnav {
            width: 100%;
            overflow: hidden;
            background-color: #fff;
            border: 1px black solid;
            border-radius: 3px;
            transition: max-height 0.4s;
        }

        .topnav a {
            float: left;
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            border: 1px black solid;
        }

        .topnav a:hover {
            background-color: #fff;
            color: black;
            text-decoration: none;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
            text-decoration: none;
        }

        .topnav .icon {
            display: none;
            height: 53.88px;
        }

        @media screen and (max-width: 991px) {
            .topnav a:not(:first-child) {
                display: none;
            }

            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 991px) {
            .topnav.responsive {
                position: relative;
                width: 110%;
            }

            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }

            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">Gallery</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="index.html">Home</a></li>
                                <li>Gallery</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if($events->count())
    <div class="comp-view" style="padding-left: 80px; padding-top: 10px;">
        <ul class="nav nav-tabs">
            @foreach ($events as $i => $event)
            <li class="{{ $i == 0 ? 'active' : '' }}">
                <a href="#event{{ $i }}" data-toggle="tab">{{ $event->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    
    @if($events->count())
    <div class="mob-view" style="padding-left: 110px; padding-top: 10px;">
        <ul class="nav nav-tabs" style="width:100%;">
            <div class="topnav" id="myTopnav">
                @foreach ($events as $i => $event)
                <a href="#event{{ $i }}" data-toggle="tab">{{ $event->name }}</a>
                @endforeach
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </ul>
    </div>
    @endif
    
    <div class="tab-content" style="padding-left: 80px;">
        <br />
        @foreach ($events as $i => $event)
        <div id="event{{ $i }}" class="tab-pane fade {{ $i == 0 ? 'in active' : '' }}">
            @foreach ($event->galleries as $gallery)
            @if ($gallery->status == 1)
            <div class="col-md-3" style="margin-bottom:36px;">
                <a data-fancybox="gallery" href="{{ asset('assets/admin/images/events') . '/' . $gallery->image }}">
                    <img src="{{ asset('assets/admin/images/events') . '/' . $gallery->image }}" class="img-responsive img-thumbnail" style="height: 200px; width: 250px;"/>
                </a>
            </div>
            @endif
            @endforeach
            <div style="clear:both"></div>
        </div>
        @endforeach
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

@endsection
