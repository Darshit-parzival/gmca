@extends('layouts.main')

@section('main-section')

<style>
    /* Styling for the nav-tabs */
    /* Nav Tabs Styling */
    .nav-tabs {
        border-bottom: 2px solid #2d3e50;
        margin-bottom: 20px;
    }

    .nav-tabs>li>a {
        color: #2d3e50;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 4px 4px 0 0;
    }

    .nav-tabs>li.active>a{
        background-color: #2d3e50 !important;
        color: #fff !important;
    }
    .nav-tabs>li>a:hover {
        background-color: #576473;
        color: #fff;
    }

    /* Teacher Card Styling */
    .single-teacher-item {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        transition: transform 0.3s ease;
        text-align: center;
        padding: 20px;
    }

    .single-teacher-item:hover {
        transform: translateY(-10px);
    }

    /* Image Styling */
    .single-teacher-image img {
        width: 200px !important;
        height: 250px !important;
        /* Set a fixed height */
        object-fit: cover;
        /* Maintain aspect ratio */
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .single-teacher-image img:hover {
        transform: scale(1.05);
    }

    /* Text Styling */
    .single-teacher-text2 {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 15px;
    }

    .teacher-name {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .teacher-designation {
        font-size: 16px;
        color: #777;
    }

    /* Tab Content */
    .tab-content {
        padding: 20px 0;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .nav-tabs>li>a {
            padding: 8px 12px;
        }
    }
</style>
<!-- tab -->

<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Staff</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="/">Home</a>
                            </li>
                            <li>Staff</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Teachers Area Start-->
<div class="teachers-area padding-top" style="padding-top: 50px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>OUR STAFF</h3>
                        <!--<p>There are many variations of passages of Lorem Ipsum</p>-->
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- feculty option  -->

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#teaching">Teaching</a></li>
            <li><a data-toggle="tab" href="#non-teaching">Non-Teaching</a></li>
        </ul>

        <div class="tab-content">
            <div id="teaching" class="tab-pane fade in active">
                <div class="row pt-5">
                    <?php foreach ($staff as $member): ?>
                        <?php if ($member->isfaculty == 1): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 teaching-tab">
                                <div class="single-teacher-item">
                                    <div class="single-teacher-image">
                                        <a href="/staffdetails/<?= $member->staff_id ?>">
                                            <img src="{{ asset('assets/admin/images/admins' . '/' . $member->photo) }}" alt="avatar">
                                        </a>
                                    </div>
                                    <div class="single-teacher-text2">
                                        <h4 class="teacher-name"><?= htmlspecialchars($member->name) ?></h4>
                                        <p class="teacher-designation"><?= htmlspecialchars($member->designation) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div id="non-teaching" class="tab-pane fade">
                <div class="row pt-5">
                    <?php foreach ($staff as $member): ?>
                        <?php if ($member->isstaff == 1): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 teaching-tab">
                                <div class="single-teacher-item">
                                    <div class="single-teacher-image">
                                        <a href="/staffdetails/<?= $member->staff_id ?>">
                                            <img src="{{ asset('assets/admin/images/admins' . '/' . $member->photo) }}" alt="avatar">
                                        </a>
                                    </div>
                                    <div class="single-teacher-text2">
                                        <h4 class="teacher-name"><?= htmlspecialchars($member->name) ?></h4>
                                        <p class="teacher-designation"><?= htmlspecialchars($member->designation) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>



    </div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var hash = window.location.hash;

        if (hash === "#nt") {
            document.querySelector('a[href="#non-teaching"]').click();
        } else {
            document.querySelector('a[href="#teaching"]').click();
        }
    });
</script>

@endsection