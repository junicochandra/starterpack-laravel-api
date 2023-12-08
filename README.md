<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# StarterPack Laravel API
Welcome to StarterPack Laravel API! This is a project specifically designed to expedite the development of Laravel-based applications, with a primary focus on API development. By utilizing this StarterPack, you'll have a robust foundation for building reliable and efficient web services using Laravel, one of the most popular PHP frameworks.

## Key Features
### Simplified Project Structure
StarterPack Laravel API provides a well-organized project structure, helping you avoid confusion in the initial project setup and allowing you to focus on feature development.
### Integrated JWT Bearer Authentication
Experience secure authentication using the JWT Bearer token system. This integration allows for seamless and token-based user authentication, ensuring a high level of security for your API endpoints.
### Email Notification System with Job Queue
Utilize Laravel's powerful job queue system to send emails asynchronously, improving the performance and responsiveness of your application. Schedule and process email sending jobs efficiently in the background, enhancing user experience.

## Getting Started
### Installation
Clone this repository and follow the installation guide to set up your project quickly.
```bash
git clone https://github.com/junicochandra/starterpack-laravel-api.git
```
### Configuration
Customize the project configuration according to your application's needs, including database settings, environment configurations, and other variables.
```bash
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=someone@username.com
MAIL_PASSWORD=app_password_your_email
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=someone@username.com
MAIL_FROM_NAME=”${APP_NAME}”

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120
```
### JWT ENV
[More documentation](https://jwt-auth.readthedocs.io/en/develop)
```bash
php artisan jwt:secret
```
## License
This project is licensed under the MIT License, allowing you to use, distribute, and modify this project as per your needs.

Thank you for choosing StarterPack Laravel API to kickstart your Laravel application development journey! If you have any questions or feedback, feel free to contact at junicodwi.chandra@gmail.com.
