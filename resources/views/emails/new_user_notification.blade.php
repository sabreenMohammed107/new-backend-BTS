<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; }
        .container { width: 100%; max-width: 600px; margin: 20px auto; border: 1px solid #e1e1e1; border-radius: 8px; overflow: hidden; }
        .logo-section { text-align: center; padding: 20px; background-color: #ffffff; }
        .logo-section img { max-width: 180px; height: auto; }
        .header { background-color: #376EFF; color: #ffffff; padding: 15px; text-align: center; }
        .header h1 { margin: 0; font-size: 20px; }
        .content { padding: 30px; }
        .field-label { font-weight: bold; color: #555; text-transform: uppercase; font-size: 11px; margin-bottom: 5px; letter-spacing: 1px; }
        .field-value { background-color: #f9f9f9; padding: 12px; border-radius: 4px; margin-bottom: 20px; border-left: 4px solid #376EFF; font-size: 14px; }
        .footer { text-align: center; font-size: 12px; color: #888; padding: 20px; background-color: #f4f4f4; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <img src="{{ asset('front-assets/img/logo.png') }}" alt="BTS Consultant Logo">
        </div>

        <div class="header">
            <h1>New Contact Request</h1>
        </div>

        <div class="content">
            <p>Hello Admin,</p>
            <p>A new enquiry has been submitted through the website contact form.</p>

            <div class="field-label">Sender Name</div>
            <div class="field-value">{{ $contact->sender_name }}</div>

            <div class="field-label">Email Address</div>
            <div class="field-value">{{ $contact->sender_email }}</div>

            <div class="field-label">Subject</div>
            <div class="field-value">{{ $contact->sender_subject }}</div>

            <div class="field-label">Message</div>
            <div class="field-value" style="white-space: pre-line;">{{ $contact->sender_message }}</div>

            <p style="font-size: 12px; color: #999;">
                <em>Received on: {{ $contact->created_at->format('Y-m-d H:i') }}</em>
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} BTS Consultant. All rights reserved. <br>
            <a href="https://btsconsultant.com" style="color: #376EFF; text-decoration: none;">www.btsconsultant.com</a>
        </div>
    </div>
</body>
</html>
