<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# AdminDesk - Help Desk Ticketing System

AdminDesk is a comprehensive help desk ticketing system built with Laravel. It allows users to create, manage, and track support tickets efficiently.

## Features

- User authentication (login, registration)
- Ticket creation and management
- Status, Priority, Type, Department, Category management
- Commenting on tickets
- Attachment support for tickets
- Role-based access control (implied by policies)

## Technologies Used

- Laravel (PHP Framework)
- Tailwind CSS
- Alpine.js
- MySQL (or other database supported by Laravel)

## Setup Instructions

Follow these steps to get AdminDesk up and running on your local machine.

### 1. Clone the Repository

```bash
git clone https://github.com/amirulsymml/adminDesk.git
cd adminDesk
```

### 2. Install Composer Dependencies

```bash
composer install
```

### 3. Environment Configuration

Create a copy of the `.env.example` file and name it `.env`:

```bash
cp .env.example .env
```

Generate an application key:

```bash
php artisan key:generate
```

Edit the `.env` file and configure your database connection. For example, for MySQL:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. Database Migration and Seeding

Run the database migrations to create the necessary tables:

```bash
php artisan migrate
```

If you want to populate your database with some dummy data (e.g., for testing), run the seeders:

```bash
php artisan db:seed
```

### 5. Install Node Dependencies and Compile Assets

```bash
npm install
npm run dev
# Or for production:
# npm run build
```

### 6. Start the Development Server

```bash
php artisan serve
```

The application will typically be available at `http://127.0.0.1:8000`.

## Usage

1.  **Register/Login**: Access the application in your browser and register a new user or log in with existing credentials (if seeded).
2.  **Dashboard**: Navigate to the dashboard to see an overview of tickets.
3.  **Ticket Management**: Create new tickets, view existing ones, add comments, and manage attachments.
4.  **Configuration**: (If applicable for admin users) Manage categories, departments, priorities, statuses, and types.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
