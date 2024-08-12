@extends('layouts.main')

@section('main-section')

<style>
    .single-teacher-item
    {
        border-bottom-right-radius: 14px;
        border-bottom-left-radius: 14px;
        padding: 15px;
        border-bottom: solid;
        border-color: #2d3e50;    
    }
    .single-teacher-item:hover{
        /* border-color:#e67f22; */
        border-color: none !important;
    }    
    .single-teacher-image > a:after {
        /* background: rgba(230, 127, 34, 0.8) none repeat scroll 0 0; */
        background: none;
    }    
    .single-teacher-text2
    {
        text-align: center;
        border-radius: 44px !important;
    }    
    .nav-tabs>li>a:hover {
        border-color: #eee #eee #ddd;
        background-color: white;
        color: white;
        background-color: #2e3e50 !important;
        transition: 0.9s;
    }    
    .nav-tabs>li>a{
        color: #2d3e50;
    }    
    .tab-content .row .teching-tab {
        padding-top: 30px !important;
    }
    /* 
    .nav-tabs>li>a:active {
        background-color: #2d3e50d6;
        color: white;
    }
    
    
    .nav-tabs>li>a:focus {
        background-color: #2d3e50d6;
        color: white;
    } */
    
    </style>
    <!-- tab -->
    
    <!--Breadcrumb Banner Area Start-->
    <div class="breadcrumb-banner-area" >
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
    
            <div class="tab-content ">
            <div id="teaching" class="tab-pane fade in active">
            <!-- <h1>teaching</h1> -->
                        <div class="row pt-5">
                                <div class="col-lg-3 col-md-4 col-sm-6 teching-tab">
                                    <div class="single-teacher-item" style="text-align:center;">
                                        <div class="single-teacher-image">
                                            <a href="staff_detail.php?id=1">
                                                <img src='avatar.png' alt="avtar" style="width:200px; height:250px; align-item:center;">
                                            </a>
                                        </div>
                                        <div class="single-teacher-text2">
                                            <h3><a href="staff_detail.php?id=1"></a></h3>
                                            <h4>Name</h4>
                                            <h4>designation</h4>
                                            {{-- Designation --}}
                                        </div>
                                    </div>
                                </div>
                        </div>
            </div>
            <div id="non-teaching" class="tab-pane fade">
            <!-- <h1>non-teaching</h1> -->
                <div class="row pt-5">
                        <div class="col-lg-3 col-md-4 col-sm-6 teching-tab">
                            <div class="single-teacher-item" style="text-align:center;">
                                <div class="single-teacher-image">
                                    <a href="staff_detail.php?id=1">
                                        <img src="avatar.png" alt="avtar" style="width: 200px; height: 250px;">
                                    </a>
                                </div>
                                <div class="single-teacher-text2">
                                    <h3><a href="staff_detail.php?id=1"></a></h3>
                                    <h4>Name</h4>
                                    <h4>Designation</h4>
                                            <!-- <h4>Designation</h4> -->
                                </div>
                            </div>
                        </div>
                </div>
            </div>
           
        </div>
    
       <!-- old  -->
            <!-- <div class="row">
                <?php
                $sel = "SELECT * FROM `registration` WHERE no=1";
                $qry = mysqli_query($con, $sel);
                while ($row = mysqli_fetch_assoc($qry)) {
                    $sel_user = "SELECT * FROM `user_type` WHERE `no`='" . $row['no'] . "' ";
                    $qry_user = mysqli_query($con, $sel_user);
                    $row_user = mysqli_fetch_assoc($qry_user);
                    $img_path = $row['profile'];
                    ?>
                    <?php
                    $sel1 = "SELECT * FROM `personal_dtls` WHERE `reg_id`='" . $row['reg_id'] . "'";
                    $qry1 = mysqli_query($con, $sel1);
                    $row1 = mysqli_fetch_assoc($qry1);
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-teacher-item">
                            <div class="single-teacher-image">
                                <a href="staff_detail.php?id=<?php echo $row['reg_id'] ?>">
                                    <img src="<?php 
                                    if($row['profile']=="")
                                    {
                                        echo $assestsRegistration.'avatar.png';
                                    }
                                    else
                                    {
                                    echo $assestsRegistration. $img_path;
                                    }
                                     ?>" alt="" style="width: 200px; height: 250px;">
                                </a>
                            </div>
                            <div class="single-teacher-text2">
                                <h3><a href="staff_detail.php?id=<?php echo $row['reg_id'] ?>"></a></h3>
                                <h4><?php echo $row['name']; ?></h4>
                                <h4><?php echo $row1['designation']; ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } ?>  
            </div> -->
        </div>
    </div>

@endsection