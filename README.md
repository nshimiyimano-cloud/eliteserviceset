# EliteServiceSet — PHP + MySQL Interior Design Website

## Quick setup
1. Import `sql/schema.sql` into your MySQL server (create database `interior_db` or change in `inc/db.php`).
2. Edit `inc/db.php` with your DB credentials.
3. Place this project folder in your web server root and visit `index.php`.

## Composer & PHPMailer
From project root run:

```bash
composer require phpmailer/phpmailer
```

Then edit `inc/mailer.php` and set the `$MAIL_CFG` array with your SMTP credentials.

## Admin
Default admin is created automatically on first visit to `/admin/login.php` if no admin exists:
- Username: `admin`
- Password: `Admin@123`

Change the password after first login via Admin > Change Password.

## Visuals
This project uses hotlinked Unsplash images for hero, carousel, and placeholders. Replace with your own uploaded images in `assets/uploads/` if you prefer.
