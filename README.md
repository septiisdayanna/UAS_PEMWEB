<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# UAS_PEMWEB

## Overview

UAS_PEMWEB is a web application project designed as a final assignment for the Web Programming course. The application features a user-friendly interface for managing posts and categories, along with user authentication and role-based access control.

## Features

- User authentication (Login)
- Role-based access control (Admin and Pengelola)
- CRUD operations for posts and categories
- SweetAlert integration for better user experience
- Profile management for users

## Frontend Screenshots

### Dashboard
![Dashboard](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/Dashboard.png)

### Posts
![Posts](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/post.png)

### Read More Post
![Read More Post](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/read%20more%20post.png)

### Post Categories
![Post Categories](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/post%20categories.png)

### All Categories
![All Categories](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/all%20category.png)

## Backend Screenshots

### Dashboard
![Admin Dashboard](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/dashboard%20(2).png)

### Post Management (Pengelola)
![Post Management Pengelola](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/post%20pengelola.png)

### Post Management (Admin)
![Post Management Admin](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/post%20admin.png)

### Create Post
![Create Post](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/create%20post.png)

### Category Management (Admin)
![Category Management Admin](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/category%20admin.png)

### SweetAlert Notifications
![SweetAlert Notifications](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/sweetarlert%20post.png)

### Configuration (Admin)
![Configuration Admin](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/config%20admin.png)

### Profile Management (Pengelola)
![Profile Management Pengelola](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/profile%20pengelola.png)

### User List (Admin)
![User List Admin](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/list%20users%20admin.png)

### Login
![Login](https://github.com/septiisdayanna/UAS_PEMWEB/blob/main/TAMPILAN/login.png)

## Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/septiisdayanna/UAS_PEMWEB.git
   cd UAS_PEMWEB
   ```

2. Install dependencies:
   ```sh
   composer install
   npm install
   ```

3. Create a copy of the `.env` file:
   ```sh
   cp .env.example .env
   ```

4. Generate an application key:
   ```sh
   php artisan key:generate
   ```

5. Configure your `.env` file with your database credentials and other necessary settings.

6. Run database migrations:
   ```sh
   php artisan migrate
   ```

7. Seed the database (optional):
   ```sh
   php artisan db:seed
   ```

8. Serve the application:
   ```sh
   php artisan serve
   ```

## Usage

- Access the frontend at `http://localhost:8000`
- Login as an admin or pengelola to access the backend features





