# Email Configuration Guide for Hostinger

This guide will help you configure email functionality for the contact form using Hostinger mail service.

## Prerequisites

1. You must have an email account set up in your Hostinger control panel
2. Access to your Laravel `.env` file

## Step 1: Get Your Hostinger Mail Settings

Log into your Hostinger control panel and navigate to Email section. You'll need:

- **SMTP Host**: Usually `smtp.hostinger.com`
- **SMTP Port**: `465` (SSL) or `587` (TLS)
- **Your Email Address**: The email you created (e.g., `hello@yourdomain.com`)
- **Your Email Password**: The password for your email account

## Step 2: Configure Your .env File

Open your `.env` file and update the following settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_USERNAME=your-email@yourdomain.com
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=your-email@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"

# Admin email - where contact form submissions will be sent
MAIL_ADMIN_EMAIL=your-email@yourdomain.com
```

### Alternative Configuration (TLS on port 587)

If port 465 doesn't work, try TLS on port 587:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=your-email@yourdomain.com
MAIL_PASSWORD=your-email-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
MAIL_ADMIN_EMAIL=your-email@yourdomain.com
```

## Step 3: Clear Configuration Cache

After updating your `.env` file, run:

```bash
php artisan config:clear
php artisan cache:clear
```

## Step 4: Test Your Email Configuration

You can test if emails are working by submitting a contact form on your website, or use Laravel Tinker:

```bash
php artisan tinker
```

Then run:

```php
Mail::raw('Test email', function ($message) {
    $message->to('your-email@yourdomain.com')
            ->subject('Test Email');
});
```

## How It Works

When someone submits the contact form:

1. **Admin Email**: You (admin) receive an email notification with:
   - Contact person's name, email, phone
   - Subject (if provided)
   - Their message
   - Submission timestamp

2. **User Email**: The person who submitted the form receives a confirmation email:
   - Thank you message
   - Summary of what they submitted
   - Expected response time
   - Your contact information

## Troubleshooting

### Emails Not Sending

1. **Check Credentials**: Ensure your email and password are correct
2. **Check Port**: Try switching between port 465 (SSL) and 587 (TLS)
3. **Check Logs**: Look at `storage/logs/laravel.log` for error messages
4. **Firewall**: Ensure your server allows outbound connections on ports 465/587

### Common Hostinger Issues

1. **Authentication Failed**:
   - Verify your email password is correct
   - Some Hostinger accounts require you to enable "Less secure app access"

2. **Connection Timeout**:
   - Try using TLS (port 587) instead of SSL (port 465)
   - Check if your server's firewall blocks SMTP ports

3. **From Address Rejected**:
   - Make sure `MAIL_FROM_ADDRESS` matches your Hostinger email
   - The email domain must match your website domain on Hostinger

### Testing Locally

If you're testing on localhost, Hostinger SMTP should still work. Make sure:
- Your internet connection is stable
- Ports 465 or 587 are not blocked by your local firewall

## Email Templates

The email templates are located in:
- `resources/views/emails/contact-admin.blade.php` - Admin notification
- `resources/views/emails/contact-user.blade.php` - User confirmation

You can customize these templates to match your branding.

## Security Notes

1. **Never commit `.env` file** to version control
2. **Use environment variables** for sensitive information
3. **Keep email passwords secure**
4. Consider using **queue workers** for sending emails in production to avoid delays

## Optional: Queue Configuration (For Production)

For better performance, configure queues to send emails asynchronously:

1. Update `.env`:
```env
QUEUE_CONNECTION=database
```

2. Create queue table:
```bash
php artisan queue:table
php artisan migrate
```

3. Update mail classes to use queues (implement `ShouldQueue`)

4. Run queue worker:
```bash
php artisan queue:work
```

## Support

If you continue to face issues:
1. Check Hostinger documentation: https://support.hostinger.com/
2. Contact Hostinger support
3. Review Laravel logs in `storage/logs/laravel.log`
