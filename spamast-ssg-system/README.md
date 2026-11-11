Individual contribution: Attendance module
- Pull request: https://github.com/fjbaguinat-ux/Group_1_Baguinat/pull/3
- Files: AttendanceController.php, Attendance.php, attendance migration, resources/views/attendance/*

# spamast-ssg-system

> Laravel web app with registration, events, attendance, sanctions and login.
> QA, database and documentation maintained by **Francis**.

---

## 1. Setup Instructions

### Requirements
- PHP 8.1 or higher
- Composer
- MySQL (XAMPP / Laragon) or SQLite
- Node.js and npm (if the project uses Vite)
- Git

### Steps
1. Clone the repository
   ```
   git clone <repo-link-here>
   cd <project-folder>
   ```
2. Install PHP dependencies
   ```
   composer install
   ```
3. Create the environment file
   ```
   cp .env.example .env
   php artisan key:generate
   ```
4. Open `.env` and set the database details
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Create the empty database (for example `your_database_name`) in phpMyAdmin.
6. Run migrations (and seeders if available)
   ```
   php artisan migrate
   php artisan db:seed
   ```
7. Install front-end packages (if needed)
   ```
   npm install
   npm run dev
   ```
8. Start the server
   ```
   php artisan serve
   ```
   Open http://127.0.0.1:8000

> Never commit the `.env` file. It contains passwords.

---

## 2. Database

### Tables and owners
| Table | Module | Developer | Status |
|---|---|---|---|
| users | Registration / Login | | |
| events | Events | | |
| attendances | Attendance | | |
| sanctions | Sanctions | | |

### Relationships (fill in with the team)
- A user **has many** attendances
- An event **has many** attendances
- A user **has many** sanctions
- An attendance **belongs to** a user and an event

### Migration rules
- One migration per table. Do not edit a migration that teammates have already run; create a new one instead.
- Foreign keys must point to tables that are migrated first (check the file timestamps).
- Before pushing, run `php artisan migrate:fresh` to confirm everything builds from scratch.

### Questions for module developers
- [ ] Final column names for each table
- [ ] Which columns are required or nullable
- [ ] Which foreign keys need cascade delete

---

## 3. Testing Checklist

Mark each with PASS or FAIL and note the date.

### 3.1 Setup checklist (Landing, Register, Login)
| # | Item | How to test | Result | Date | Notes |
|---|---|---|---|---|---|
| 2.2 | Landing route set in `routes/web.php` | Open the file and check the `/` route | | | |
| 2.3 | `landing-page.blade.php` exists | Check `resources/views` | | | |
| 2.4 | Landing page loads in browser | Visit `/` | | | |
| 2.5 | `RegisterController` and `LoginController` use `view()` | Check `app/Http/Controllers` | | | |
| 2.6 | `register.blade.php` and `login.blade.php` exist | Check `resources/views` | | | |
| 2.7 | Named routes `register` and `login` | `php artisan route:list` | | | |
| 2.8 | `/register` and `/login` load after cache | `php artisan route:cache`, then visit both | | | |

> After testing 2.8, run `php artisan route:clear` so cached routes do not hide new ones.

### 3.2 Registration
| Test case | Expected | Result | Notes |
|---|---|---|---|
| Register with valid details | Account created, saved in `users` table | | |
| Leave required fields empty | Validation errors shown | | |
| Use an email that already exists | Error: email taken | | |
| Password and confirmation do not match | Error shown | | |

### 3.3 Login
| Test case | Expected | Result | Notes |
|---|---|---|---|
| Correct email and password | Redirects to dashboard | | |
| Wrong password | Error message, stays on login | | |
| Unregistered email | Error message | | |
| Logout | Returns to landing or login page | | |
| Visit a protected page while logged out | Redirects to login | | |

### 3.4 Events
| Test case | Expected | Result | Notes |
|---|---|---|---|
| Create an event | Appears in list and database | | |
| Edit an event | Changes saved | | |
| Delete an event | Removed from list and database | | |
| Submit with empty required fields | Validation errors | | |

### 3.5 Attendance
| Test case | Expected | Result | Notes |
|---|---|---|---|
| Record attendance for a user and event | Saved in `attendances` | | |
| Record the same user twice for one event | Blocked or flagged | | |
| Attendance for a deleted event | Handled without errors | | |

### 3.6 Sanctions
| Test case | Expected | Result | Notes |
|---|---|---|---|
| Add a sanction to a user | Saved and linked to the user | | |
| View a user's sanctions | Correct list shown | | |
| Edit or remove a sanction | Changes saved | | |

---

## 4. Bug Log

| ID | Date found | Module | Description | Steps to reproduce | Severity (Low/Med/High) | Reported to | Status |
|---|---|---|---|---|---|---|---|
| B-001 | | | | 1. 2. 3. | | | Open |

**Status values:** Open, In progress, Fixed, Retested

---

## 5. Git Workflow (for the team)

```
git pull                      # get the latest changes
# ...make your changes...
git add .
git commit -m "Short message about what you did"
git push
```

Commit message examples:
- `Add test results for login`
- `Document bug B-002 in attendance`
- `Update setup instructions`

---

## 6. Team

| Name | Role |
|---|---|
| Francis | Database, Testing and Documentation |
| | |

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

