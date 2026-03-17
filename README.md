# 1625 Auto Lab — Autoshop Management System

A Laravel 12 + Livewire 4 web application for **1625 Auto Lab**, a retrofit & head-unit specialists shop.
Clients can browse services, meet the team, and book appointments online. Staff manage everything through a dedicated admin panel.

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2+, Laravel 12, Livewire 4 |
| Frontend | Bootstrap 5, Vite |
| Database | SQLite (default) |

---

## Requirements

- PHP ≥ 8.2 with the extensions listed in `composer.json`
- [Composer](https://getcomposer.org/)
- Node.js ≥ 18 & npm *(only needed if you want to rebuild frontend assets)*

---

## Quick Start

```bash
# 1. Clone the repository
git clone https://github.com/bitress/autoshop.git
cd autoshop

# 2. Install PHP dependencies
composer install

# 3. Set up the environment file and generate an application key
cp .env.example .env
php artisan key:generate

# 4. Run database migrations
php artisan migrate

# 5. Serve the application
php artisan serve
```

Then open **http://localhost:8000** in your browser.

> **Note:** Pre-compiled frontend assets are included in the repository (`public/build/`), so no Node.js build step is required for basic usage.

---

## Rebuilding Frontend Assets

If you modify the CSS or JavaScript source files under `resources/`, rebuild with:

```bash
npm install
npm run build
```

For live hot-reload during development:

```bash
npm run dev
```

---

## Available Routes

| URL | Description |
|---|---|
| `/` | Home / landing page |
| `/services` | Services listing |
| `/team` | Team members |
| `/booking` | Book an appointment |
| `/admin` | Admin dashboard |
| `/admin/appointments` | Manage appointments |
| `/admin/services` | Manage services |
| `/admin/team` | Manage team members |

---

## License

MIT
