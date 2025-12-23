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
        .section-title { font-size: 16px; font-weight: bold; color: #376EFF; margin: 20px 0 10px 0; border-bottom: 2px solid #f0f0f0; padding-bottom: 5px; }
        .field-label { font-weight: bold; color: #555; text-transform: uppercase; font-size: 10px; margin-bottom: 3px; letter-spacing: 1px; }
        .field-value { background-color: #f9f9f9; padding: 10px; border-radius: 4px; margin-bottom: 15px; border-left: 4px solid #376EFF; font-size: 13px; }
        .footer { text-align: center; font-size: 11px; color: #888; padding: 20px; background-color: #f4f4f4; }
        .grid { display: flex; gap: 10px; }
        .col { flex: 1; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <img src="{{ $message->embed(public_path('front-assets/img/logo.png')) }}" alt="BTS Consultant Logo">
        </div>

        <div class="header">
            <h1>New Career Application</h1>
        </div>

        <div class="content">
            <p style="margin-top:0;">Hello Admin,</p>
            <p>A new career application has been received. Here are the full details:</p>

            <div class="section-title">Position Information</div>

            <div class="field-label">Position Applied For</div>
            <div class="field-value">{{ $applicant->career->title ?? 'N/A' }}</div>

            <div class="section-title">Applicant Information</div>

            <div class="field-label">Full Name</div>
            <div class="field-value">{{ $applicant->name }}</div>

            <div class="field-label">Email Address</div>
            <div class="field-value">{{ $applicant->email }}</div>

            <div class="field-label">Mobile Number</div>
            <div class="field-value">{{ $applicant->mobile ?? 'N/A' }}</div>

            <div style="display: table; width: 100%;">
                <div style="display: table-cell; width: 50%; padding-right: 10px;">
                    <div class="field-label">Career Level</div>
                    <div class="field-value">{{ $applicant->level->level ?? 'N/A' }}</div>
                </div>
                <div style="display: table-cell; width: 50%;">
                    <div class="field-label">Expected Salary</div>
                    <div class="field-value">{{ $applicant->expected_salary ?? 'N/A' }}</div>
                </div>
            </div>

            <div class="section-title">Attachments</div>

            @if($applicant->cv_path)
            <div class="field-label">CV/Resume</div>
            <div class="field-value">
                <a href="{{ asset('storage/' . $applicant->cv_path) }}" style="color: #376EFF; text-decoration: none;">View CV</a>
            </div>
            @endif

            @if($applicant->doc_path)
            <div class="field-label">Additional Documents</div>
            <div class="field-value">
                <a href="{{ asset('storage/' . $applicant->doc_path) }}" style="color: #376EFF; text-decoration: none;">View Document</a>
            </div>
            @endif

            <p style="font-size: 11px; color: #999; text-align: center; margin-top: 30px;">
                <em>This application was submitted automatically from the website on {{ $applicant->created_at->format('M d, Y \a\t H:i') }}</em>
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} BTS Consultant. All rights reserved. <br>
            <a href="https://btsconsultant.com" style="color: #376EFF; text-decoration: none;">www.btsconsultant.com</a>
        </div>
    </div>
</body>
</html>
