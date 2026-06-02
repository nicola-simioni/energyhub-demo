# EnergyHub — Laravel Demo Project

A demo energy monitoring platform built with Laravel 13, developed as a technical showcase.

## Stack
- **Laravel 13** — PHP framework
- **PostgreSQL** — database
- **Sanctum** — API token authentication
- **Filament 3** — admin panel
- **Livewire** — reactive components

## Features
- REST API with Sanctum token authentication
- CRUD for energy sites and readings
- Custom middleware (premium user access control)
- Eloquent relationships (User → Sites → Readings)
- JSON Resources for API responses
- Filament admin panel with custom actions and relation managers
- Livewire search component with real-time filtering

## Setup
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
```

## API Endpoints
| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | /api/login | Get Sanctum token |
| GET | /api/sites | List user sites |
| POST | /api/sites | Create site |
| GET | /api/sites/{id} | Show site |
| PUT | /api/sites/{id} | Update site |
| DELETE | /api/sites/{id} | Delete site |