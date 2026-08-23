# IR Mobile Store — Laravel Application

This directory contains the Laravel web and API application for the IR Mobile Store project.

For the full project overview, including the crawling and preprocessing pipeline, see the [root README](../README.md).

## Application Scope

The application connects structured mobile-device data with customer and administration workflows.

Implemented areas include:

- products, companies and categories;
- product search and filtering;
- multi-source mobile information retrieval;
- user registration and authentication;
- Sanctum-protected API operations;
- user addresses;
- shopping cart workflows;
- orders and order history;
- product ratings;
- offers and coupons;
- contact messages;
- CSV product import;
- admin management;
- localized web routing;
- payment-record handling.

## Information Retrieval Endpoint

The API includes an information-retrieval flow that searches separate `Gsm` and `Mobolist` datasets by mobile name and returns the available source matches together.

This application therefore acts as the delivery layer for data that can originate from different mobile-information sources.

## Technology Stack

| Area | Technologies |
| --- | --- |
| Backend | PHP 8.1+, Laravel 10 |
| Authentication | Laravel Sanctum |
| Frontend | Blade, Vue 3, Bootstrap 5, Sass |
| Build Tool | Vite 4 |
| Localization | mcamara/laravel-localization |
| Data Import | league/csv |
| Commerce Packages | Laravel Cashier, Stripe PHP SDK |
| Testing | PHPUnit 10 |

## Main Application Areas

```text
app/                 Controllers, models, middleware and application logic
database/            Migrations, factories and seeders
resources/           Blade views, Vue/JavaScript and Sass assets
routes/web.php       Localized web and administration routes
routes/api.php       Product, search, retrieval, order and user APIs
tests/               Laravel test suite
```

## API Overview

The API currently contains endpoints around:

- products;
- categories;
- companies;
- company/product relationships;
- latest products;
- information retrieval;
- search by name, price, category and company;
- authenticated users and addresses;
- orders;
- ratings;
- coupons and discounts;
- offers;
- contact messages;
- CSV import;
- payment records.

Some API naming reflects the historical implementation and has intentionally not been renamed as part of documentation cleanup because route/controller renames could introduce compatibility regressions.

## Web Workflows

The localized web routes cover customer and administration experiences such as:

- product information;
- company and category browsing;
- carts;
- search and filters;
- reviews;
- profiles;
- order history;
- checkout-related routes;
- administration of companies, categories, products and orders.

## Local Setup

```bash
composer install
npm install
```

Create and configure the Laravel environment file, then generate an application key and configure the database before running migrations.

```bash
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

For frontend production assets:

```bash
npm run build
```

## Validation Status

This documentation describes the repository as implemented. It does not claim that the full runtime, migrations, payment flow, crawlers or test suite currently pass in a clean environment.

The project should receive a separate runtime/security audit before production claims are made, particularly around payment behavior, authentication/authorization coverage and external data-source integrations.
