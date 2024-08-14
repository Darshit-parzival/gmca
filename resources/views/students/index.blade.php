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
        color: #007bff;
        border-bottom: 2px solid #007bff;
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
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #0056b3;
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