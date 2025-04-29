# TSA Admin Portal (Part 1)

## Overview

This repository contains the Laravel-based Admin Portal and API endpoints for the TSA Mobile App assessment. It provides:

- A responsive Admin Portal to manage user accounts and contacts.
- RESTful API endpoints for mobile app authentication and contact management.

## Prerequisites

- PHP `^7.4` or `^8.0`
- Composer
- MySQL
- Node.js & npm (optional, for asset compilation)

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/tsa-admin-portal.git
   cd tsa-admin-portal
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Copy `.env` file and set environment variables**
   ```bash
   cp .env.example .env
   # Edit .env to set DB_DATABASE, DB_USERNAME, DB_PASSWORD, APP_KEY, etc.
   php artisan key:generate
   ```

4. **Install JavaScript dependencies** (if you plan to compile assets)
   ```bash
   npm install
   npm run dev
   ```

## Database Setup

1. **Create the database**
   In MySQL:
   ```sql
   CREATE DATABASE tsa_db;
   ```

2. **Run migrations and seed data**
   ```bash
   php artisan migrate --seed
   ```

   This will create the `users` and `contacts` tables and populate them with initial seed data.

3. **Optional: Import SQL dump**
   If you prefer to import the provided SQL dump:
   ```bash
   mysql -u username -p tsa_db < database/dumps/tsa_dump.sql
   ```

## Running the Application

Start the built-in PHP server:

```bash
php artisan serve
```

Visit the Admin Portal at [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login).

## Admin Portal

- **Login**: `/login` (blade view `auth.login`)
- **Dashboard**: `/` (blade view `dashboard`)
- **Users**: Resource routes `/users` (CRUD via `UserController`)
  - Views in `resources/views/users`
- **Contacts**: Resource routes `/contacts` (CRUD via `ContactController`)
  - Views in `resources/views/contacts`

## API Endpoints

All API routes are prefixed with `/api` and use token-based authentication (Laravel Sanctum):

| Method | Endpoint                | Description                              |
|--------|-------------------------|------------------------------------------|
| POST   | `/api/login`            | Authenticate and issue access token      |
| POST   | `/api/logout`           | Revoke current token                     |
| GET    | `/api/contacts`         | List all contacts for authenticated user |
| GET    | `/api/contacts/search`  | Search contacts by term                  |
| POST   | `/api/contacts`         | Create a new contact                     |
| PUT    | `/api/contacts/{id}`    | Update an existing contact               |

## Form Requests

Validation logic is encapsulated in `app/Http/Requests`:

- `LoginRequest`
- `CreateUserRequest`, `UpdateUserRequest`
- `CreateContactRequest`, `UpdateContactRequest`

## Seeders

Database seeders are located in `database/seeders`:

- `UserSeeder.php`
- `ContactSeeder.php`
- Registered in `DatabaseSeeder.php`

Run:
```bash
php artisan migrate:fresh --seed
```

## Assets

- CSS: `public/css/app.css`
- JS:  `public/js/app.js`
- Uploads directory: `public/uploads/`

## License

This project is released under the [MIT License](LICENSE).
