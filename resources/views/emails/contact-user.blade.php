<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
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
            margin-bottom: 30px;
        }
        .header h1 {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 0;
            font-size: 28px;
        }
        .checkmark {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .checkmark svg {
            width: 32px;
            height: 32px;
            stroke: white;
            stroke-width: 3;
            fill: none;
        }
        .content {
            margin: 30px 0;
            text-align: center;
        }
        .content p {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 15px;
        }
        .highlight-box {
            background: linear-gradient(135deg, #eff6ff, #f3f4f6);
            border-left: 4px solid #3b82f6;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: left;
        }
        .highlight-box h3 {
            color: #3b82f6;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        .highlight-box p {
            color: #4b5563;
            margin: 0;
            font-size: 14px;
            text-align: left;
        }
        .details-summary {
            background-color: #f9fafb;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        .details-summary h3 {
            margin: 0 0 15px 0;
            color: #374151;
            font-size: 16px;
            text-align: center;
        }
        .detail-row {
            display: flex;
            padding: 8px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: 600;
            color: #6b7280;
            width: 100px;
            font-size: 13px;
        }
        .detail-value {
            color: #374151;
            flex: 1;
            font-size: 14px;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            text-align: center;
            color: #6b7280;
            font-size: 14px;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="checkmark">
                <svg viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <h1>Thank You!</h1>
        </div>

        <div class="content">
            <p><strong>Hi {{ $contact->name }},</strong></p>
            <p>Thank you for reaching out to us! We have received your message and will get back to you as soon as possible.</p>
        </div>

        <div class="highlight-box">
            <h3>What Happens Next?</h3>
            <p>Our team will review your message and respond within 24-48 hours. We appreciate your patience and look forward to assisting you.</p>
        </div>

        <div class="details-summary">
            <h3>Summary of Your Submission</h3>
            <div class="detail-row">
                <div class="detail-label">Name:</div>
                <div class="detail-value">{{ $contact->name }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Email:</div>
                <div class="detail-value">{{ $contact->email }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Phone:</div>
                <div class="detail-value">{{ $contact->phone }}</div>
            </div>
            @if($contact->subject)
            <div class="detail-row">
                <div class="detail-label">Subject:</div>
                <div class="detail-value">{{ $contact->subject }}</div>
            </div>
            @endif
            <div class="detail-row">
                <div class="detail-label">Submitted:</div>
                <div class="detail-value">{{ $contact->created_at->format('F j, Y \a\t g:i A') }}</div>
            </div>
        </div>

        <div class="footer">
            <p><strong>Need immediate assistance?</strong></p>
            <p>Feel free to reach out to us directly at {{ config('mail.from.address', 'hello@example.com') }}</p>
            <p style="margin-top: 20px; color: #9ca3af; font-size: 12px;">
                This is an automated confirmation email. Please do not reply to this message.
            </p>
        </div>
    </div>
</body>
</html>
