<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f4; }
        .wrapper { width: 100%; max-width: 650px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); overflow: hidden; }
        .logo-section { text-align: center; padding: 20px 0; }
        .logo-section img { max-width: 180px; height: auto; }
        .header { background-color: #376EFF; color: #ffffff; padding: 25px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; }
        .content { padding: 30px; }
        .section-title { font-size: 18px; color: #376EFF; margin-top: 25px; margin-bottom: 15px; padding-bottom: 5px; border-bottom: 2px solid #376EFF; }
        .data-table { width: 100%; border-collapse: collapse; margin-bottom: 25px; }
        .data-table th, .data-table td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; }
        .data-table th { background-color: #f8f8f8; font-weight: bold; width: 35%; color: #555; }
        .data-table tr:last-child td { border-bottom: none; }
        .footer { text-align: center; font-size: 12px; color: #888; padding: 20px; background-color: #f4f4f4; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="logo-section">
            {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="Your Company Logo"> --}}
        <img src="{{ $message->embed(public_path('front-assets/img/logo.png')) }}" alt="BTS Consultant Logo">

        </div>

        <div class="header">
            <h1>New Course Registration</h1>
        </div>

        <div class="content">
            <p>Dear Admin,</p>
            <p>A new applicant has successfully registered for a round. Please find the details below:</p>

            <h3 class="section-title">Course & Round Information</h3>
            <table class="data-table">
                <tr>
                    <th>Course Name</th>
                    <td>{{ $applicant->courses->course_en_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Registration Round</th>
                    <td>{{ $applicant->round->round_start_date->format('Y-m-d') ?? '' }}</td>
                </tr>
                <tr>
                    <th>Round Venue</th>
                    <td>{{ $applicant->round->venue->venue_en_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Date Registered</th>
                    <td>{{ $applicant->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            </table>

            <h3 class="section-title">Applicant Details</h3>
            <table class="data-table">
                <tr>
                    <th>Name</th>
                    <td>{{ $applicant->salut->en_name ?? '' }} {{ $applicant->name }}</td>
                </tr>
                <tr>
                    <th>Company</th>
                    <td>{{ $applicant->company ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Job Title</th>
                    <td>{{ $applicant->job_title ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $applicant->email }}</td>
                </tr>
                <tr>
                    <th>Phone / Mobile</th>
                    <td>{{ $applicant->phone ?? 'N/A' }} / {{ $applicant->mobile ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $applicant->country->country_en_name ?? 'N/A' }}</td>
                </tr>
            </table>

            <h3 class="section-title">Billing Details</h3>
            <table class="data-table">
                <tr>
                    <th>Name (Billing)</th>
                    <td>{{ $billing->name }}</td>
                </tr>
                <tr>
                    <th>Company (Billing)</th>
                    <td>{{ $billing->company ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Email (Billing)</th>
                    <td>{{ $billing->email }}</td>
                </tr>
                <tr>
                    <th>Phone (Billing)</th>
                    <td>{{ $billing->phone ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Address (Billing)</th>
                    <td>{{ $billing->address ?? 'N/A' }}</td>
                </tr>
            </table>

            <p style="text-align: center; margin-top: 30px; font-size: 14px;">
                You can view the full record in the admin panel.
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} BTS Consultant. All rights reserved. | <a href="{{ url('/') }}" style="color: #376EFF; text-decoration: none;">View Website</a>
        </div>
    </div>
</body>
</html>
