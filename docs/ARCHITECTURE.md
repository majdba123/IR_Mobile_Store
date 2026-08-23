# IR Mobile Store — Architecture Overview

## System Shape

IR Mobile Store combines a data-collection pipeline with a Laravel application.

```text
External mobile-information sources
            |
            v
Python / Scrapy crawlers
            |
            v
Extraction + preprocessing
            |
            v
CSV / JSON / structured datasets
            |
            v
Laravel data models
            |
            +-------------------+
            |                   |
            v                   v
Information Retrieval API    Commerce / Product API
            |                   |
            +---------+---------+
                      |
                      v
               Web application
```

## Data Collection Layer

`crawl_scrap_preproccing/` contains the historical data-acquisition and preprocessing work. It includes a Scrapy project, standalone Python extraction logic, and intermediate/final CSV and JSON datasets.

The crawler layer is separate from the Laravel runtime and should be treated as an offline or batch data-production workflow unless explicitly integrated through a future orchestration layer.

## Application Layer

`e-store/` is the Laravel 10 application. It provides web routes and API endpoints around product discovery, catalog management, customer accounts and commerce operations.

The application uses Eloquent models to represent both commerce-domain entities and mobile-information datasets.

## Information Retrieval

The current `/api/IR` flow accepts a mobile name and searches both the `Gsm` and `Mobolist` datasets. The response returns whichever source records are available.

This is a direct multi-source retrieval mechanism. It should not be described as semantic search or a production search engine unless the implementation is expanded and validated accordingly.

## Commerce Domain

The API and web routes expose domains including:

- products;
- companies;
- categories;
- users;
- addresses;
- carts;
- orders;
- ratings;
- offers;
- coupons / discounts;
- payments;
- contact messages.

## Security Boundaries

Laravel Sanctum protects a subset of API routes. Web authentication and administration middleware are also present.

Authorization coverage should be audited separately before production security claims are made because route protection is not uniform across the entire API surface.

## Payment Boundary

Stripe SDK and Laravel Cashier dependencies exist, but the current API payment controller primarily persists payment identifiers. Commented PaymentIntent logic is present but is not active evidence of a complete Stripe transaction flow.

## Frontend

The frontend stack contains Blade, Vue 3 tooling, Bootstrap 5, Sass and Vite. The repository includes localized web routing through `mcamara/laravel-localization`.

## Validation Boundary

This document records architecture visible in source. It does not assert successful clean installation, migrations, crawler execution, payment execution, or automated-test status.
