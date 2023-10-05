# laravel-test
Laravel Test application

This project is basically a test project developed in Laravel Framework version: 9.52.15 | Database used: MySQL 
This project includes HTML, CSS, Bootstrap, jQuery, jQuery UI, DataTables, Rich Text Editor

Description:
Laravel Test project is a versatile and user-friendly content management system designed to empower both content creators and administrators. With a sleek and intuitive interface, this application allows users to effortlessly sign up, log in, and create engaging blogs, while providing administrators with powerful tools to manage and monitor the platform's performance.

Key Features:

    1. User Registration and Authentication:
        - Users can easily sign up for an account, ensuring a secure and personalized experience.
        - Robust authentication mechanisms protect user data and content.

    2. Blog Creation and Management:
        - Registered users can create and publish their own blogs with ease.
        - A user-friendly editor simplifies the content creation process.
        - Users can categorize their blogs for better organization.

    3. Admin Panel:
        - Admins have access to a secure and comprehensive admin panel.
        - Real-time statistics provide insights of blogs and users.
        - View a list of all blogs and registered users for efficient monitoring.

-------------------------------------------------------------------------------------------------------

Steps to setup the project

1: Clone project on your local machine

2: Run command to install all project dependencies- "composer install"

3: Create .env file add the content (added at bottom of the file)

4: Create database with name- "laraveltest_db"

5: Run migration command to create required tables- "php artisan migrate"

6: Run database seeding command to add default data into the database- "php artisan db:seed"

7: To run the project run command- "php artisan serve"

Signup Url: http://127.0.0.1:8000/signup
Login Url: http://127.0.0.1:8000/login
Admin Login Url: http://127.0.0.1:8000/admin/login

Admin Login Credentials
email: admin@gmail.com
password: 12345678

User Login Credentials
email: swagat@gmail.com
password: 12345678

//================= .ENV FILE CONTENT =========================

APP_NAME="Laravel Test"
APP_ENV=local
APP_KEY=base64:2et3QPPWG9zMPEA6IMp9Xc7XUH1XOy8HYok7bmfbFFE=
APP_DEBUG=true
APP_URL=http://localhost/laravel-test/public
ASSET_URL=http://localhost/laravel-test/public

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laraveltest_db
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"