# 💧 Smart Pool Monitor

A Laravel-based web application that enables admins to monitor swimmers in real-time. The system tracks swimmers' heart rate, hydration, oxygen level, temperature, and time spent in the pool. Admins can send alerts and manage swimmer data, while users can view their own dashboard.

---

## 🚀 Features

### 👨‍💻 Admin Panel
- View dashboard with stats (active swimmers, alerts, devices)
- Manage swimmer health data (CRUD)
- Search/filter swimmers by name or status
- Send alerts to swimmers
- Responsive sidebar with navigation

### 🏊 User Dashboard
- View personal swimmer stats
- Get notified of alerts
- Mobile-friendly layout with collapsible sidebar

### 🔐 Authentication
- Register/Login
- Role-based access (admin/user)
- Forgot password & reset via email (Mailtrap)

---

## 🛠️ Tech Stack

- Laravel 12.x (PHP 8.4+)
- MySQL (phpMyAdmin supported)
- Bootstrap 5 + Bootstrap Icons
- Mailtrap (for email testing)

---

## ⚙️ Setup Instructions

### 📦 Clone & Install
```bash
git clone https://github.com/your-username/smart-pool-monitor.git
cd smart-pool-monitor
composer install
cp .env.example .env
php artisan key:generate
```
###  Configure .env
- Update .env with your MySQL and Mailtrap credentials:
```bash
DB_DATABASE=smart_pool_db
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@smartpool.com
MAIL_FROM_NAME="Smart Pool Monitor"
```

### Migrate & Seed
```bash
php artisan migrate
php artisan db:seed --class=AdminSeeder
```
### Run App
```bash
php artisan serve
```
### Default Admin Account
```bash
Email: admin@smartpool.com
Password: admin
```