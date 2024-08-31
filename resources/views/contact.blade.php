@extends('layouts.main')

@section('main-section')
<style>
    .border
    {
        /*border-bottom-color: black;*/
        border: orange;
        border-style:ridge ;
        /*padding: 10px;*/
        .input-container input:focus ~ label,
            .input-container input:valid ~ label{
            top:-12px;
            font-size:12px;
        }
    }
    .sociallink
    {
        background-color:#2d3e50 !important;
        padding: 5px;
        padding-bottom: 2px;
        padding-right: 8px;
        padding-left: 8px;
    }    
    .zmd1{
        color: white;
    }
    .link-social > a {
        margin-right: 11px;
    }
    </style>
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">CONTACT US</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="index.php">Home</a></li>
                                <li>CONTACT</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of Breadcrumb Banner Area-->
    <!--Google Map Area Start-->
    <div style="height: 20px;">

    </div>
    <div class="google-map-area" alt="GMCA MAP" style="padding-left:2px;padding-right:2px">
        <!--  Map Section -->
        <div id="contacts" class="map-area">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d58760.11486242859!2d72.617823!3d23.005143!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd79c4285bf4f7081!2sGovernment%20MCA%20College!5e0!3m2!1sen!2sin!4v1611344713218!5m2!1sen!2sin" width="100%" height="385px"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <!--End of Google Map Area-->
    <!--Contact Form Area Start-->
    <div class="contact-form-area" style="margin-top:30px;margin-bottom:30px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="contact-title">contact info</h4>
                    <div class="contact-text">
                        <p><a href="tel:+91 792 293 0176"><span class="c-icon"><i class="zmdi zmdi-phone"></i></span><span class="c-text">+91 792 293 0176</span></a></p>
                        <p><a href="mailto:gmcacmnagar@gmail.com"><span class="c-icon"><i class="zmdi zmdi-email"></i></span><span class="c-text">gmcacmnagar@gmail.com</span></a></p>
                        <p><a><span class="c-icon"><i class="zmdi zmdi-pin"></i></span><span class="c-text"> Government MCA College, <br>  K. K. Shashtri Education Campus, <br> Maninagar (East), <br>Ahmedabad - 380008, INDIA</span></a></p>
                    </div>
                    <h4 class="contact-title">social media</h4>
                    <div class="link-social">
                        <a class="sociallink" target="_blank" href="https://www.facebook.com/people/Government-MCA-collegeManinagar/100064855353738/"><i class="zmdi zmdi-facebook zmd1"></i></a>
                        <a class="sociallink" target="_blank" href="https://twitter.com/GMCA_Maninagar"><i class="zmdi zmdi-twitter zmd1"></i></a>
                        <a class="sociallink" target="_blank" href="https://www.youtube.com/channel/UCqELfLg-8aKMD6-L9MUWDMw/featured"><i class="zmdi zmdi-youtube zmd1"></i></a>
                    </div>
                </div>
                <div class="col-md-7">
                    <h4 class="contact-title">send your massage</h4>
                    <form id="contact-form" action="include/contact_insert.php" method="post">
                        <div class="row">
                            <div class="col-md-4 input-container">
                                <input type="text" name="name" placeholder="Your Name" pattern="[A-Za-z]{3,}" required >
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email" placeholder="Your Email" required >
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="contact_no" pattern="[0-9]{10}" placeholder="Your Contact Number" required>
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                <button type="submit" class="button-default">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
    <!--End of Contact Form-->

    <!--<script type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFr5PKEUaw45PLBusmppl8z9tgk6bL1PA&callback=initMap"></script>-->
    <!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>-->
    <script>
        function initialize() {
            var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(23.0051431, 72.6178231)
            };

            var map = new google.maps.Map(document.getElementById('googleMap'),
                    mapOptions);


            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: 'img/map-marker.png',
                map: map
            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection