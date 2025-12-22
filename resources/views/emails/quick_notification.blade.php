<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { width: 100%; max-width: 600px; margin: 20px auto; border: 1px solid #e1e1e1; border-radius: 8px; overflow: hidden; }
        .logo-section { text-align: center; padding: 20px; background-color: #ffffff; }
        .logo-section img { max-width: 180px; height: auto; }
        .header { background-color: #376EFF; color: #ffffff; padding: 15px; text-align: center; }
        .header h1 { margin: 0; font-size: 20px; text-transform: uppercase; letter-spacing: 1px; }
        .content { padding: 30px; }
        .field-label { font-weight: bold; color: #555; text-transform: uppercase; font-size: 11px; margin-bottom: 5px; letter-spacing: 1px; }
        .field-value { background-color: #f9f9f9; padding: 12px; border-radius: 4px; margin-bottom: 20px; border-left: 4px solid #376EFF; font-size: 14px; }
        .footer { text-align: center; font-size: 12px; color: #888; padding: 20px; background-color: #f4f4f4; }
        .enquiry-notes { white-space: pre-line; background-color: #fffbe6; border-left-color: #faad14; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-section">
            {{-- <img src="{{ asset('front-assets/img/logo.png') }}" alt="BTS Consultant Logo"> --}}
            <img src="{{ $message->embed(public_path('front-assets/img/logo.png')) }}" alt="BTS Consultant Logo">
        </div>

        <div class="header">
            <h1>New Quick Enquiry</h1>
        </div>

        <div class="content">
            <p>Hello Admin,</p>
            <p>A new <strong>Quick Enquiry</strong> has been submitted. Here are the details of the applicant:</p>

            <div style="display: table; width: 100%;">
                <div style="display: table-cell; width: 50%; padding-right: 10px;">
                    <div class="field-label">Full Name</div>
                    <div class="field-value">{{ $applicant->salut->en_name ?? '' }} {{ $applicant->name }}</div>
                </div>
                <div style="display: table-cell; width: 50%;">
                    <div class="field-label">Email Address</div>
                    <div class="field-value">{{ $applicant->email }}</div>
                </div>
            </div>

            <div style="display: table; width: 100%;">
                <div style="display: table-cell; width: 50%; padding-right: 10px;">
                    <div class="field-label">Company</div>
                    <div class="field-value">{{ $applicant->company }}</div>
                </div>
                <div style="display: table-cell; width: 50%;">
                    <div class="field-label">Designation</div>
                    <div class="field-value">{{ $applicant->job_title ?? 'N/A' }}</div>
                </div>
            </div>

            <div style="display: table; width: 100%;">
                <div style="display: table-cell; width: 50%; padding-right: 10px;">
                    <div class="field-label">Country</div>
                    <div class="field-value">{{ $applicant->country->country_en_name ?? 'N/A' }}</div>
                </div>
                <div style="display: table-cell; width: 50%;">
                    <div class="field-label">City</div>
                    <div class="field-value">{{ $applicant->venues->venue_en_name ?? 'N/A' }}</div>
                </div>
            </div>

            @if($applicant->quk_enquery_notes)
                <div class="field-label">Enquiry Message</div>
                <div class="field-value enquiry-notes">{{ $applicant->quk_enquery_notes }}</div>
            @endif

            <p style="font-size: 12px; color: #999; margin-top: 20px;">
                <em>Received on: {{ $applicant->created_at->format('Y-m-d H:i') }}</em>
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} BTS Consultant. All rights reserved. <br>
            <a href="https://btsconsultant.com" style="color: #376EFF; text-decoration: none;">www.btsconsultant.com</a>
        </div>
    </div>
</body>
</html>
