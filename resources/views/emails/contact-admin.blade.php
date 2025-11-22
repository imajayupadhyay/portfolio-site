<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 3px solid #3b82f6;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #3b82f6;
            margin: 0;
            font-size: 24px;
        }
        .badge {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-label {
            font-weight: 600;
            color: #555;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }
        .info-value {
            font-size: 16px;
            color: #222;
            padding: 10px;
            background-color: #f9fafb;
            border-left: 3px solid #3b82f6;
            border-radius: 4px;
        }
        .message-box {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            white-space: pre-wrap;
            line-height: 1.8;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }
        .timestamp {
            color: #9ca3af;
            font-size: 13px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="badge">NEW SUBMISSION</div>
            <h1>Contact Form Submission</h1>
        </div>

        <div class="info-section">
            <div class="info-label">From</div>
            <div class="info-value">{{ $contact->name }}</div>
        </div>

        <div class="info-section">
            <div class="info-label">Email Address</div>
            <div class="info-value">
                <a href="mailto:{{ $contact->email }}" style="color: #3b82f6; text-decoration: none;">
                    {{ $contact->email }}
                </a>
            </div>
        </div>

        <div class="info-section">
            <div class="info-label">Phone Number</div>
            <div class="info-value">
                <a href="tel:{{ $contact->phone }}" style="color: #3b82f6; text-decoration: none;">
                    {{ $contact->phone }}
                </a>
            </div>
        </div>

        @if($contact->subject)
        <div class="info-section">
            <div class="info-label">Subject</div>
            <div class="info-value">{{ $contact->subject }}</div>
        </div>
        @endif

        <div class="info-section">
            <div class="info-label">Message</div>
            <div class="message-box">{{ $contact->message }}</div>
        </div>

        <div class="footer">
            <p class="timestamp">Submitted on {{ $contact->created_at->format('F j, Y \a\t g:i A') }}</p>
            <p>You can reply directly to this email to respond to {{ $contact->name }}.</p>
        </div>
    </div>
</body>
</html>
