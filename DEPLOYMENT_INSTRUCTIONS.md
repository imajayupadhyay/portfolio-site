# Deployment Instructions for ajayupadhyay.in (Hostinger cPanel)

## Files Created
1. **portfolio-deployment.zip** (7.8 MB) - Your complete deployment package
2. **.env.hostinger** - Production environment template

---

## Step-by-Step Deployment Guide

### Step 1: Prepare Your Hostinger Account

1. **Login to Hostinger cPanel**
   - Go to https://hpanel.hostinger.com
   - Login with your credentials

2. **Verify Database**
   - Go to **MySQL Databases** section
   - Note down:
     - Database name
     - Database username
     - Database password
     - Database host (usually `localhost`)

---

### Step 2: Upload Files

**Option A: Using File Manager (Recommended for no SSH)**

1. In cPanel, go to **File Manager**
2. Navigate to your domain's root folder (usually `public_html` or `domains/ajayupadhyay.in`)
3. **IMPORTANT**: Your Laravel files should go in a folder ABOVE `public_html`
   - Go up one level from `public_html`
   - Create a folder named `portfolio` (or any name)
   - This keeps Laravel files secure

4. Click **Upload** and upload `portfolio-deployment.zip`
5. Once uploaded, **right-click** the zip file and select **Extract**
6. Delete the zip file after extraction

**Option B: Using FTP**

1. Use FileZilla or any FTP client
2. Connect using FTP credentials from Hostinger
3. Upload `portfolio-deployment.zip` to the folder above `public_html`
4. Use cPanel File Manager to extract the zip

---

### Step 3: Configure Environment File

1. In File Manager, navigate to your portfolio folder
2. Find `.env.hostinger` file
3. **Rename** it to `.env`
4. **Edit** the file and update these values:

```env
DB_DATABASE=your_actual_database_name
DB_USERNAME=your_actual_database_username
DB_PASSWORD=your_actual_database_password
```

5. Update mail settings if you want contact form to work:
```env
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=587
MAIL_USERNAME=your_email@ajayupadhyay.in
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@ajayupadhyay.in"
```

6. **Save** the file

---

### Step 4: Set Up Document Root

1. In Hostinger cPanel, go to **Domains** section
2. Find `ajayupadhyay.in` and click **Manage**
3. Look for **Document Root** or **Web Root** setting
4. Change it to: `/domains/ajayupadhyay.in/portfolio/public`
   - Or if files are in: `/home/username/portfolio/public`
5. **Save** the changes

---

### Step 5: Set Permissions

1. In File Manager, navigate to your portfolio folder
2. Set these folder permissions (right-click → Permissions):
   - `storage/` → **775** (recursive)
   - `storage/framework/` → **775** (recursive)
   - `storage/logs/` → **775** (recursive)
   - `bootstrap/cache/` → **775** (recursive)

---

### Step 6: Run Database Migrations

Since you don't have SSH, you need to create a temporary file:

1. In File Manager, go to `public` folder
2. Create a new file named `migrate.php`
3. Add this content:

```php
<?php

// Load Laravel
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

// Run migrations
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$status = $kernel->call('migrate', ['--force' => true]);

echo "Migration completed with status: " . $status;

// Clear caches
$kernel->call('config:cache');
$kernel->call('route:cache');
$kernel->call('view:cache');

echo "<br>Caches cleared and optimized!";
```

4. Visit: `https://ajayupadhyay.in/migrate.php`
5. You should see "Migration completed"
6. **DELETE** the `migrate.php` file immediately after (security!)

---

### Step 7: Create .htaccess (if not exists)

Make sure `/public/.htaccess` exists with this content:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

---

### Step 8: Configure PHP Settings (Optional but Recommended)

1. In cPanel, go to **Select PHP Version** or **PHP Settings**
2. Make sure PHP version is **8.2 or higher**
3. Enable these PHP extensions if available:
   - BCMath
   - Ctype
   - JSON
   - Mbstring
   - OpenSSL
   - PDO
   - Tokenizer
   - XML
   - cURL

---

### Step 9: Test Your Website

1. Visit `https://ajayupadhyay.in`
2. Your portfolio should load!
3. Test all pages:
   - Home
   - Projects
   - Contact form

---

## Troubleshooting

### 500 Internal Server Error
- Check `.env` file exists and has correct database credentials
- Check folder permissions (storage and bootstrap/cache)
- Check PHP version is 8.2+

### Blank Page
- Enable error display temporarily in `.env`:
  ```env
  APP_DEBUG=true
  ```
- Check error logs in cPanel → Errors
- Remember to set `APP_DEBUG=false` after fixing!

### Database Connection Error
- Verify database credentials in `.env`
- Make sure database exists in cPanel
- Check if database user has all privileges

### Assets Not Loading (CSS/JS)
- Make sure document root points to `/portfolio/public`
- Check if `public/build/` folder exists with assets
- Clear browser cache

### Contact Form Not Working
- Configure MAIL settings in `.env`
- Test by submitting contact form
- Check `storage/logs/laravel.log` for errors

---

## Security Checklist

- [ ] `.env` file has correct production settings
- [ ] `APP_DEBUG=false` in `.env`
- [ ] `APP_ENV=production` in `.env`
- [ ] Deleted `migrate.php` after running migrations
- [ ] Storage and bootstrap/cache have correct permissions
- [ ] Database credentials are strong
- [ ] All sensitive files are outside `public` folder

---

## Future Updates

To update your site in the future:

1. Make changes locally
2. Run `composer install --optimize-autoloader --no-dev`
3. Run `npm run build`
4. Run `php artisan optimize`
5. Create new zip file
6. Upload and extract to server
7. Clear caches via the temporary `migrate.php` method

---

## Support

If you encounter issues:
1. Check cPanel error logs
2. Check `storage/logs/laravel.log`
3. Temporarily enable `APP_DEBUG=true` to see detailed errors
4. Contact Hostinger support for server-specific issues

---

**Your deployment package is ready at:**
`/Users/ajayupadhyay/Desktop/Laravel/portfolio/portfolio-deployment.zip`

**Good luck with your deployment! 🚀**
