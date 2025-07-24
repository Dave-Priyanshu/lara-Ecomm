# 🌟 LARA eCOMM

A modern eCommerce platform built with the power of:

<p align="left">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/Livewire-4B5563?style=for-the-badge&logo=livewire&logoColor=white"/>
  <img src="https://img.shields.io/badge/Filament-6366F1?style=for-the-badge&logo=data:image/svg+xml;base64,&logoColor=white" />
  <img src="https://img.shields.io/badge/TailwindCSS-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white"/>
</p>

---

## 🚀 Features

- ✅ Laravel 12 powered backend
- ⚡ Livewire for seamless reactive UI (thinking to add for front-end)
- 📘 FilamentPHP for elegant vendor/admin dashboards
- 🎨 TailwindCSS for modern design
- 🔐 Authentication using **Laravel Breeze**
- 🔗 Social Login (Google & Facebook) using **Laravel Socialite**
- 🛍️ Normal users can:
  - Register/Login
  - Browse and purchase products
- 🛒 Vendors can:
  - Verify via email OTP to become a valid vendor
  - Access Filament Dashboard
  - Create categories/subcategories/child-categories (multi-layered)
  - Add products to any category

---

## 🛠️ Installation & Setup

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/your-username/lara-ecomm.git
cd lara-ecomm
```

### 2️⃣ Install Dependencies
```bash
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
```

### 3️⃣ Install Laravel Breeze (for Auth)
```bash
composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
```

### 4️⃣ Install Filament
Full Admin Panel:
```bash
composer require filament/filament:"^3.3" -W
```
OR Simple Resource Scaffold:
```bash
php artisan make:filament-resource Product --simple
```
---

## 🔐 Social Authentication Setup
### 📌 Google Login
Follow [this Medium guide](https://medium.com/@mimranisrar6/how-to-add-a-google-login-using-socialite-in-laravel-21f6eebafcec) to set up Google credentials.

Add to `.env`:

```env
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-secret
GOOGLE_CALLBACK_REDIRECT=http://localhost:8000/auth/google/callback
```

In `config/services.php`:

```php
'google' => [
    'client_id' => env('GOOGLE_CLIENT_ID'),
    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    'redirect' => env('GOOGLE_CALLBACK_REDIRECT'),
],
```

### 📌 Facebook Login

Create credentials at [https://developers.facebook.com/](https://developers.facebook.com/)

Add to `.env`:

```env
FACEBOOK_CLIENT_ID=your-facebook-client-id
FACEBOOK_CLIENT_SECRET=your-facebook-secret
FACEBOOK_CALLBACK_REDIRECT=http://localhost:8000/auth/facebook/callback
```

In `config/services.php`:

```php
'facebook' => [
    'client_id' => env('FACEBOOK_CLIENT_ID'),
    'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    'redirect' => env('FACEBOOK_CALLBACK_REDIRECT'),
],
```

---

## 📦 Packages Used

* [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) - Lightweight auth scaffolding
* [Laravel Socialite](https://laravel.com/docs/socialite) - Social Login
* [FilamentPHP](https://filamentphp.com) - Admin Panel & Resource Management
* [TailwindCSS](https://tailwindcss.com/) - CSS Framework

---

## 📌 Status

🛠️ **Frontend design is currently in progress.**

---

## 🤝 Hire Me

Looking for a Laravel developer?
📩 [Connect with me on LinkedIn](https://www.linkedin.com/in/priyanshu-dave2001/)

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).


---
