@extends('layouts.main')
@section('main-section')

<style>
    h2 {
            color: #333;
        }
        h4 {
            margin-bottom: 20px;
        }
        ul {
            list-style-type: disc;
            padding-left: 40px;
        }
        li {
            margin-bottom: 10px;
            font-size: 20px;
        }
        .counter {
            margin-top: 20px;
        }
         hr {
            border: 0;
            height: 1px;
            background: #ccc;
            margin-bottom: 20px;
        }
</style>

<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Library</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="index.php">Home</a></li>
                            <li>Library</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->

<div class="event-area section-padding bg-white" style="padding-top: 50px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title" style="padding-bottom: 5px;">
                        <h3>Library</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add the following div to display the increasing number of titles -->
        
        <div class="comment-text">
            <h3 style="font-family: 'Segoe UI, Arial, Hevetica, sans-serif'; font-weight:bold;">INTRODUCTION:</h3>
            <hr>
    <ul>
        <li>
            <h4>Library continued to be the hub of all research and academic activities of GMCA and played a significant role in facilitating the creation and dissemination of knowledge. It is continuing to evolve and is using new technologies to expand its presence as vertical knowledge centers for information-sharing communities.</h4>
        </li>
        <li>
            <div >No. of Titles = <span id="counter">0</span></div>
        </li>
        <li>
            <div >No. of Volumes = <span id="counter2">0</span></div>
        </li>
    </ul>
            <hr>

        <div class="comment-text">
            <h3 style="font-family: 'Segoe UI, Arial, Hevetica, sans-serif'; font-weight:bold;">Subscribed Magazines:</h3>
            <hr>
    <ul>
        <li>
            <div >Open Source for You</div>
        </li>
        <li>
            <div >Competitive Success Review</div>
        </li>
        <li>
            <div >General Knowledge</div>
        </li>
    </ul>
            
        <!--        <div class="author-info">-->
        <!--<div id="titleCounter" style="text-align: center; margin-top: 20px; font-size: 20px;">Open Source for You</div>-->
        <!--<div id="titleCounter" style="text-align: center; margin-top: 20px; font-size: 20px;">Competitive Success Review</div>-->
        <!--<div id="titleCounter" style="text-align: center; margin-top: 20px; font-size: 20px;">Competitive Success Review General Knowledge</div>-->
        <!--        </div>-->
            </div>
            <br><br>

<div class="single-comment">
            <div class="author-image">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-journal-album" viewBox="0 0 16 16"> <path d="M5.5 4a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5zm1 7a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3z"/> <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/> <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/> </svg>
            </div>
            <div class="comment-text">
                <div class="author-info">
                    <h4><a target="_blank" href="{{ asset('assets/static/OpenAccessJournals.pdf') }}">Open Access Journal</a></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function displayIncreasingNumbers() {
        let counter = 500;
        let counter2 = 3000;
        const counterElement = document.getElementById('counter');
        const counterElement2 = document.getElementById('counter2');

        function updateCounter() {
            counterElement.textContent = counter++;
            if (counter > 1065)
                clearInterval(intervalId);
        }
        function updateCounter2() {
            counterElement2.textContent = counter2++;
            if (counter2 > 3832)
                clearInterval(intervalId2);
        }
            const intervalId = setInterval(updateCounter, 1);
            const intervalId2 = setInterval(updateCounter2, 1);
    }

    displayIncreasingNumbers();
</script>

@endsection