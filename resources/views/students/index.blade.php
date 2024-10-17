@extends('layouts.main')

@section('main-section')
<style>
    /* body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
        color: #333;
    } */

    /* .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    } */

    main {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(600px, 1fr));
        gap: 20px;
    }

    .support-item {
        background-color: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .support-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .support-item h2 {
        margin-top: 0;
        font-size: 1.5em;
        color: #2d3e50;
        border-bottom: 2px solid #2d3e50;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .support-item p,
    .support-item ul {
        font-size: 1em;
        line-height: 1.6;
        color: #666;
    }

    .support-item ul {
        padding-left: 20px;
    }

    .support-item ul li {
        margin-bottom: 10px;
    }

    .support-item ul li a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .support-item ul li a:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    .button {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1em;
        font-weight: bold;
        color: #ffffff;
        background-color: #2d3e50;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #576473;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .container {
            padding: 10px;
        }

        main {
            grid-template-columns: 1fr;
        }

        .support-item {
            padding: 15px;
        }
    }

    @media (max-width: 480px) {
        .button {
            padding: 8px 16px;
            font-size: 0.9em;
        }
    }
</style>
<!--<script src='https://kit.fontawesome.com/a076d05399.js'></script>-->
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-text">
                    <h1 class="text-center">Student Section</h1>
                    <div class="breadcrumb-bar">
                        <ul class="breadcrumb text-center">
                            <li><a href="index.php">Home</a>
                            </li>
                            <li><a href="academic.php">Academic</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="event-area section-padding bg-white" style="padding-top: 50px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title" style="padding-bottom: 5px;">
                        <h3>Student Section of GMCA</h3>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="single-comment">
            <div class="comment-text">
                <div class="author-info">
                    <h4>The student section at GMCA College serves as the central administrative unit dedicated to managing various aspects & responsibilities crucial to student life and academic affairs.</h4>
                </div>
            </div>
        </div>
        <div style="margin-bottom:30px;">
            <p style="font-family:'montserratregular'; font-size:14px; text-align:justify;">
                It overlooks essential functions such as reporting of students after ACPC admissions, university enrollment, and academic records maintenance for students. The student section also coordinates examinations, facilitates managing student databases, term fee collection and student feedback collection and analysis. Additionally, it plays a crucial role in handling student queries, providing information on scholarships, travel concession passes, various certificates like No Objection Certificate, language certificate , bonafide certificate By ensuring efficient operations and support services, the student section department contributes significantly to fostering a conducive learning environment and overall student satisfaction at GMCA college.
            </p>
        </div>
        <hr>
        <ul style="text-align: justify; padding:0 30px; font-family:'montserratregular';   list-style-type: disc;">
            <li style="margin-bottom:10px"><b>Admissions and Enrollment: </b>Handling the admission process, including application reviews, document verification, and enrollment procedures for new and continuing students.</li>
            
            <li style="margin-bottom:10px"><b>Academic Records: </b>Maintaining accurate records of students' academic progress, including grades, transcripts, and certifications.</li>
            
            <li style="margin-bottom:10px"><b>Fee collection: </b>Handling term fee collection and resolving queries related to the same.</li>
            
            <li style="margin-bottom:10px"><b>Scholarships and Financial Aid: </b>Providing information on available scholarships, grants, and financial aid options, as well as assisting students with applications and disbursements.</li>
            
            <li style="margin-bottom:10px"><b>Student Services: </b>Addressing student queries and concerns related to administrative processes, academic policies, and general information as well as providing support for scholarships, travel concession passes, anti-ragging, various certificates like No Objection Certificate, language certificate, bonafide certificate etc.</li>
        
            <li style="margin-bottom:10px"><b>Student Grievances: </b>Handling complaints and grievances from students, ensuring fair and prompt resolution through established procedures.</li>
            
            <li style="margin-bottom:10px"><b>Student Feedback collection: </b>Handling collection and analysis of student feedbacks for all courses and program.</li>
        </ul>
        
        <hr>
        <h3 style="font-family: 'Segoe UI, Arial, Hevetica, sans-serif'; font-weight:bold;">Enrollment Cancellation:</h3>
        <ul style="text-align: justify; padding:0 30px; font-family:'montserratregular'; list-style-type: disc;">
            <li style="margin-top:10px;">Properly drafted handwritten application of student clearly stating reason for admission cancellation signed by Student with declaration by Parent/Guardian with sign.</li>
            <li style="margin-top:10px;">Properly filled Admission cancellation form with <b>Rs. 300/- cancellation charges</b></li>
            <li style="margin-top:10px;">NOC from Institute</li>
            <li style="margin-top:10px;"><a href="{{asset('assets/static/FORMAT_FOR_ENROLLMENT_CANCELLATION_APPLICATION_FOR_STUDENT.pdf')}}" target="_blank">FORMAT FOR ENROLLMENT CANCELLATION APPLICATION FOR STUDENT</a></li>
            <li style="margin-top:10px;"><a href="{{ asset('assets/static/GMCA_NOC_FOR_ENROLLMENT_CANCELLATION.pdf')}}" target="_blank">GMCA NOC FOR ENROLLMENT CANCELLATION</a></li>
        </ul>
    </div>
</div>


<div class="student-support">
    <div class="container">
        <main>
            <section class="support-item">
                <h2>1. Registration Form</h2>
                <a href="#" class="button">Access Registration Form</a>
            </section>

            <section class="support-item">
                <h2>2. College Fees Payment</h2>
                <a href="#" class="button">Pay Fees Online</a>
            </section>

            <section class="support-item">
                <h2>3. Scholarship Opportunities</h2>
                <ul>
                    <li><a href="https://digitalgujarat.gov.in" target="_blank">Digital Gujarat</a></li>
                    <li><a href="https://scholarships.gov.in" target="_blank">National Scholarship Portal (NSP)</a></li>
                </ul>
                <p><strong>Eligibility Instructions:</strong></p>
                <ul>
                    <li>Ensure you meet the income criteria set by the scholarship provider.</li>
                    <li>Provide valid documents as proof of eligibility.</li>
                    <li>Submit the application before the deadline.</li>
                </ul>
            </section>

            <section class="support-item">
                <h2>4. No Due Generator</h2>
                <a href="#" class="button">Generate No Due Certificate</a>
            </section>

            <section class="support-item">
                <h2>5. Scholarship Application Form</h2>
                <a href="#" class="button">Apply for Scholarship</a>
            </section>

            <section class="support-item">
                <h2>6. Course Exit Survey</h2>
                <a href="#" class="button">Complete Course Exit Survey</a>
            </section>

            <section class="support-item">
                <h2>7. Bonafide Certificate Request</h2>
                <a href="#" class="button">Request Bonafide Certificate</a>
            </section>

            <section class="support-item">
                <h2>8. No Objection Certificate (NOC)</h2>
                <a href="#" class="button">Request NOC</a>
            </section>

            <section class="support-item">
                <h2>9. Student Details Edit</h2>
                <a href="#" class="button">Edit Your Details</a>
            </section>

            <section class="support-item">
                <h2>10. GTU Student Portal</h2>
                <a href="https://student.gtu.ac.in" target="_blank" class="button">Access GTU Portal</a>
            </section>

            <section class="support-item">
                <h2>11. Downloadable Forms</h2>
                <a href="#" class="button">Bus Pass Application</a>
                <a href="#" class="button">Other Transportation Forms</a>
            </section>
        </main>
    </div>
</div>
@endsection