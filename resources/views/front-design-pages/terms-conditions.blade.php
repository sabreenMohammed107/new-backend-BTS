@extends('front-design-pages.front-layout.app')
<!-- Body main wrapper start -->

@section('page-id', 'terms-conditions-page')
@section('page-content')
<style>
    .terms-content {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .terms-content h3 {
        color: #32a2a8;
        font-size: 1.5rem;
        font-weight: 600;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .terms-content h3:first-of-type {
        margin-top: 0;
    }

    .terms-content p {
        color: #666;
        line-height: 1.8;
        margin-bottom: 15px;
        text-align: justify;
    }

    .terms-content ul {
        list-style: none;
        padding-left: 0;
    }

    .terms-content ul li {
        color: #666;
        line-height: 1.8;
        margin-bottom: 10px;
        padding-left: 20px;
        position: relative;
    }

    .terms-content ul li:before {
        content: "•";
        color: #32a2a8;
        font-weight: bold;
        position: absolute;
        left: 0;
    }

    .section-number {
        color: #32a2a8;
        font-weight: 700;
    }

    .intro-text {
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 30px;
        padding: 20px;
        background-color: #f9f9ff;
        border-left: 4px solid #32a2a8;
    }
</style>

<!-- Page Header -->
<div class="main-course-bg-header">
    <div class="course-main-title text-center">
        <h2>Registration Terms & Conditions</h2>
    </div>
</div>

<!-- Main Content -->
<div class="container" style="margin-top: 70px; margin-bottom: 70px;">
    <div class="row">
        <div class="col-12">
            <div class="terms-content">
                <div class="intro-text">
                    Please read these terms and conditions carefully before registering for any of our training courses. By completing your registration, you acknowledge that you have read, understood, and agree to be bound by these terms.
                </div>

                <h3><span class="section-number">1)</span> Registration</h3>
                <p>
                    Registration for courses can be made via our website (<a href="http://www.btsconsultant.com" target="_blank">www.btsconsultant.com</a>) or by contacting our Registration Desk on +971 2 6452630 or at <a href="mailto:info@btsconsultant.com">info@btsconsultant.com</a>
                </p>
                <p>
                    For on-line bookings, please select the course that you require and click on the "Register Now" button, following the instructions step by step.
                </p>
                <p>
                    Upon receipt of booking in order, enrollment on the respective training course will be confirmed by Registration Team with all necessary documentation.
                </p>
                <p>
                    For Company restoration can be by Official restoration E-mail, P.O. or Service contract.
                </p>

                <h3><span class="section-number">2)</span> Invoicing and Payment</h3>
                <p>
                    Our fees include course presentation, relevant materials, physical & digital documentation, lunch and refreshments served during training. Accommodation charges are not included in the course fees.
                </p>
                <p>
                    Course fees are payable upon receiving confirmation & Invoice from BTS unless a valid, authorized Purchase Order is provided and accepted.
                </p>
                <p>
                    Invoices will be sent via email/courier to the ID/name and address provided.
                </p>
                <p>
                    We prefer to have the fees payment in our account before the start of training course. However, if your company has a different payment policy, the same should inform us in advance.
                </p>
                <p>
                    The currency of fees is in US Dollars (USD). Payments can be made in USD or AED (Arab Emirates Dirhams) either by Bank Transfer or by Credit Card. Our Bank Account details will be provided on the Invoice.
                </p>
                <p>
                    Please note that we do accept payment by cash, in USD or AED, only for the last minute bookings.
                </p>

                <h3><span class="section-number">3)</span> Cancellation of Courses</h3>
                <p>
                    It may be necessary for BTS to amend or cancel any course, course times, instructors, and dates or published fees due to unforeseen circumstances and we reserve the right for such changes.
                </p>
                <p>
                    Any amendments will be advised before the course start date and any bookings already paid in full will not be subject to increased fees.
                </p>

                <h3><span class="section-number">4)</span> Cancellation by Client</h3>
                <p>
                    Once you have completed your booking, received your confirmation of enrolment and a dated payment Invoice, you are deemed to have a contract with BTS. You reserve the right to cancel this contract given the below terms:
                </p>
                <ul>
                    <li>All cancellations must be received in writing at <a href="mailto:info@btsconsultat.com">info@btsconsultat.com</a> at least 15 days prior to the training.</li>
                    <li>After the cancellation period has expired, consideration may be given, on a case to case basis, if a registered delegate nominates a substitute on the same course, shifts to next session of the course or moves to a new course.</li>
                    <li>For a cancellation request made on or before the statutory 15 day cancellation period, a credit note issued which can be used against future course fees. Or Full refund of the Exact amount received with the same method received (not include bank charges).</li>
                </ul>

                <h3><span class="section-number">5)</span> Attendance Certificate</h3>
                <p>
                    The daily course schedule should be accurately followed to ensure undeterred implementation of our training.
                </p>
                <p>
                    All delegates, who participated in their course throughout, will receive the Certificate of Completion on the last day.
                </p>
                <p>
                    Please report any foreseeable absences to a BTS Instructor representative or to your sponsors directly.
                </p>
                <p>
                    An absence of more than 20% of the course will invalidate your eligibility for the Certificate of Completion.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

