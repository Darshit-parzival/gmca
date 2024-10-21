@extends('layouts.main')

@section('main-section')

<style>

a{
    color:#333;
}
a:hover{
    color:#333;
    text-decoration:none;
}

#disclaimer{
    margin-top: 30px;
    margin-bottom: 30px;
}

.rti-box{
    border: 1px solid #80808045;
    font-size: 13px; 
    margin-top: 20px;
    padding: 0px !important;
}

.rti-team {
    background-color: #2d3e50;
    color: white;
    font: 20px;
    font-weight:600;
    padding: 10px;
}

.rtis{
    padding: 10px;
}

.mr-2{
    margin-right: 10px;
}

.rti-main .ml{
    margin-left:20px !important;
}

.rti-main{
    margin: 30px 15px 15px 15px ;
}

.resp{
    margin-left: 40px !important;
}

.bullet-links {
    width:90%;
    list-style-type: disc; /* Sets the bullet style */
    padding-left: 20px; /* Adjust the left padding */
    margin:auto;
}

.bullet-links li {
    margin-bottom: 5px; /* Adjust the spacing between each link */
}

.bullet-links a {
    text-decoration: none; /* Removes underline from links */
    color: #333; /* Sets the color of the links */
}

.bullet-links a:hover {
    color: #007bff; /* Sets the color of the links on hover */
}


@media (max-width: 991px) {
    .resp {
        margin-left: 0px !important;
    }
}
</style>

<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">RTI</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="/">Home</a>
                            </li>
                            <li>RTI</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<section id="disclaimer" class="container">
    
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title" style="padding-bottom: 5px;">
                        <h3>RIGHT TO INFORMATION ACT</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="font-size: 13px; padding-top: 20px;">       
            <div class="about-text-container" style="font-family: Poppins ,sans-serif;  font-size: 14px; line-height: 22px; ">

                        <p style="text-align: justify;">
                            <!-- <span style="font-size: 17px;">     -->
                            The Right to Information Act, 2005 (22 of 2005) has been enacted by the Parliament and has come into force from 15 June, 2005. This Act provides for right to information for citizens to secure access to information under the control of public authorities in order to promote transparency and accountability in the working of every public authority. All Universities and Colleges established by law made by Parliament or by State Legislature or by notification by the appropriate Government or owned, controlled or substantially financed directly or indirectly by funds provided by the Government shall come within the meaning of a Public Authority under this Act.
            <!-- </span> -->
                        </p>
                        <ul class="bullet-links">
                            <li><a href="assets/pdf/rti-act.pdf" target="_blank">THE RIGHT TO INFORMATION ACT, 2005</a></li>
                            <li><a href="assets/pdf/rti-act-2005-gujarati.pdf" target="_blank">માહિતી અધિકાર અધિનિયમ , ૨૦૦૫  </a></li>
                        </ul>
                        <p style="text-align: justify;">
                        The names designations and other particulars of the Public Information Officers
                        </p>
            </div>    
        </div>
        <div class="rti-main">
            <div class="col-md-5 rti-box">
                
                <div class="rti-team bold">
                    Appellate Authority / Nodal Officer
                </div>
                <div class="rtis">
                    <span class="rti-contect"><i class="fa fa-user mr-2" aria-hidden="true"></i>Dr. Chetan B Bhatt,<br>
                    Principal</span><br>
                    <span class="rti-contect">
                    <i class="fa fa-map-marker mr-2" aria-hidden="true"></i> Government MCA College, K. K. Shashtri Education
                                Campus, Maninagar (East), Ahmedabad - 380008, INDIA
                    </span><br>
                    <span class="rti-contect">
                    <i class="fa fa-phone mr-2" aria-hidden="true"></i><a href="tel:+917922930176">+91 7922930176</a>
                    </span><br>
                    <!-- <span class="rti-contect">
                    <i class="fa-solid fa-phone-office"></i>079 2326 8111
                    </span><br> -->
                    <span class="rti-contect">
                    <i class="fa fa-envelope mr-2" aria-hidden="true"></i><a href="mailto:gmcacmnagar@gmail.com">gmcacmnagar@gmail.com</a>
                    </span>

                </div>
            </div>
            <div class="col-md-5 rti-box resp">
            <div class="rti-team bold">
                Public Information Officer (PIO)
                </div>
                <div class="rtis">
                    <span class="rti-contect"><i class="fa fa-user mr-2" aria-hidden="true"></i>Prof B.B. Prajapati
                    <br>Head of Department</span><br>
                    <span class="rti-contect">
                    <i class="fa fa-map-marker mr-2" aria-hidden="true"></i> Government MCA College, K. K. Shashtri Education
                                Campus, Maninagar (East), Ahmedabad - 380008, INDIA
                    </span><br>
                    <span class="rti-contect">
                    <i class="fa fa-phone mr-2" aria-hidden="true"></i><a href="tel:+917922930176">+91 7922930176</a>
                    </span><br>
                    <!-- <span class="rti-contect">
                    <i class="fa-solid fa-phone-office"></i>079 2326 8111
                    </span><br> -->
                    <span class="rti-contect">
                    <i class="fa fa-envelope mr-2" aria-hidden="true"></i><a href="mailto:gmcacmnagar@gmail.com">gmcacmnagar@gmail.com</a>
                    </span>

                </div>
            </div>
        </div>


    
</section>

@endsection