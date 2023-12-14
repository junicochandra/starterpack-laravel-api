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
-   #### Simplified Project Structure
    StarterPack Laravel API provides a well-organized project structure, helping you avoid confusion in the initial project setup and allowing you to focus on feature development.
-   #### Integrated JWT Bearer Authentication
    Experience secure authentication using the JWT Bearer token system. This integration allows for seamless and token-based user authentication, ensuring a high level of security for your API endpoints.
-   #### Send Email with Job Queue Laravel or RabbitMq
    Enables asynchronous email sending using Laravel Job Queue or RabbitMQ to enhance performance and avoid execution blocking.
-   #### API Documentation
    Utilizes the Laravel API Documentation Package integrated with Swagger to generate automatic and interactive API documentation based on the source code.
    
## Getting Started
#### 1. Installation
Clone this repository and follow the installation guide to set up your project quickly.
```bash
git clone https://github.com/junicochandra/starterpack-laravel-api.git
```
Install Dependencies
```bash
composer install
```

#### 2. Configuration
Customize the project configuration according to your application's needs, including database settings, environment configurations, and other variables.
```bash
cp .env.example .env
```
Once you've completed the setup of your environment, execute the following command.
```bash
php artisan key:generate

php artisan migrate
```

#### 3. JWT ENV
Run JWT environment. [More documentation](https://jwt-auth.readthedocs.io/en/develop)
```bash
php artisan jwt:secret
```
## License
This project is licensed under the MIT License, allowing you to use, distribute, and modify this project as per your needs.

Thank you for choosing StarterPack Laravel API to kickstart your Laravel application development journey! If you have any questions or feedback, feel free to contact at junicodwi.chandra@gmail.com.
