# IR Mobile Store — Mobile Information Retrieval & Commerce Platform

[English](README.md) | [العربية](README_AR.md)

> A mobile-device information retrieval and commerce platform that combines web crawling, data preprocessing, multi-source phone specifications, search and comparison APIs, and Laravel-based e-commerce workflows.

## Overview

IR Mobile Store is a combined **information-retrieval, data-collection, and e-commerce project** focused on mobile phones.

The repository contains two major layers:

1. a Python/Scrapy-based data collection and preprocessing workspace used to gather and normalize mobile-device information from multiple sources;
2. a Laravel application under [`e-store/`](e-store/) that exposes web and API workflows for products, companies, categories, search, comparison, carts, orders, offers, coupons, user accounts, ratings, payments and administration.

The project goes beyond a simple catalog: it demonstrates how external product information can be collected, transformed into structured datasets, stored in application models, and exposed through a web/API product experience.

## Information Retrieval

The repository includes an information-retrieval endpoint that searches two separate mobile datasets for the same phone name and returns the available matches together.

This makes the system useful for comparing or aggregating phone information across multiple data sources instead of relying on a single catalog.

The current Laravel models include dedicated structures for different source datasets, including `Gsm` and `Mobolist` records with mobile specifications such as display, chipset, processor, GPU, camera, storage, sensors, connectivity, weight and other device attributes.

## Data Collection & Preprocessing

The [`crawl_scrap_preproccing/`](crawl_scrap_preproccing/) workspace contains the data-engineering side of the project.

It includes:

- Python-based crawling and scraping;
- Scrapy project structure;
- product-detail extraction;
- crawlers for multiple phone families / brands;
- structured CSV and JSON datasets;
- preprocessing artifacts;
- specification text extraction;
- source URL collections;
- experiments around extracting structured mobile specifications.

The scraping code includes product-detail extraction from mobile specification pages and writes structured records that can be processed further before ingestion into the application layer.

## E-commerce & Product Capabilities

The Laravel application exposes both web and API functionality for:

- products;
- companies / manufacturers;
- categories;
- product search;
- search by name, price, category and company;
- product filtering;
- shopping cart operations;
- orders and order history;
- user addresses;
- product ratings;
- offers;
- coupon / discount handling;
- contact messages;
- user registration and login;
- Sanctum-protected user operations;
- email-verification related flows;
- admin management;
- CSV product import;
- payment-record handling.

## API Layer

The API is implemented with Laravel and includes resource-style endpoints plus dedicated operations for business workflows.

Examples of supported API areas include:

- product and category resources;
- company/product relationships;
- latest products;
- multi-source information retrieval;
- search endpoints;
- authenticated user and address management;
- order creation and retrieval;
- product ratings;
- discounts and offers;
- contact messaging;
- payment records.

Authentication-sensitive endpoints use Laravel Sanctum middleware in the current implementation.

## Web Application

The web layer includes localized routing and authenticated customer workflows for:

- product details;
- browsing companies and categories;
- cart management;
- search and filters;
- product reviews;
- user profile management;
- order history;
- checkout-related routes;
- administrative product/company/category management.

The repository includes Laravel localization support and Vue tooling in the frontend asset pipeline.

## Technology Stack

| Area | Technologies |
| --- | --- |
| Backend | PHP 8.1+, Laravel 10 |
| API Authentication | Laravel Sanctum |
| Frontend | Blade, Vue 3, Bootstrap 5, Sass |
| Build Tooling | Vite 4 |
| Data Collection | Python, Scrapy, Requests, BeautifulSoup |
| Data Formats | CSV, JSON |
| Payments / Commerce Packages | Laravel Cashier, Stripe PHP SDK |
| Localization | mcamara/laravel-localization |
| Testing | PHPUnit 10 |

## Repository Structure

```text
.
├── e-store/                         # Laravel web/API application
│   ├── app/
│   ├── database/
│   ├── resources/
│   ├── routes/
│   ├── tests/
│   ├── composer.json
│   └── package.json
├── crawl_scrap_preproccing/         # Crawling, scraping and preprocessing workspace
│   ├── myspider/                    # Scrapy project
│   ├── *.csv                        # Processed / source datasets
│   ├── *.json                       # Extracted structured data
│   └── specification text artifacts
├── compare_Regex_NLP.pdf             # Supporting analysis document
├── README.md
└── README_AR.md
```

The existing repository structure is intentionally preserved to avoid breaking historical paths or application assumptions.

## Local Development

For the Laravel application:

```bash
cd e-store
composer install
npm install
npm run dev
```

Typical Laravel environment setup is also required, including `.env`, application key, database configuration and migrations.

For a production frontend build:

```bash
npm run build
```

The crawling workspace has its own Python dependencies and should be treated as a separate data-collection environment from the Laravel application.

## Engineering Notes

This repository contains several stages of the same system lifecycle: data acquisition, preprocessing, structured storage, information retrieval, API exposure and commerce workflows.

That makes it best presented as a **mobile-device information retrieval and commerce platform**, rather than only as an online mobile store.

## Runtime & Security Status

The repository includes PHPUnit configuration and application test tooling, but this documentation update does not claim that the current runtime, migrations, crawlers, payments, authentication or automated tests have been fully validated.

The Stripe SDK and Laravel Cashier are present in the project, while the current API payment controller primarily records payment data and contains commented Stripe PaymentIntent logic. The repository therefore should not be presented as having a fully verified automated Stripe payment integration without a separate runtime/security audit.

External scraping targets and source-site rules may change over time. Crawlers should be revalidated before production or repeated data collection use.

## Project Positioning

IR Mobile Store demonstrates a cross-functional software pipeline:

`Web Sources → Crawling → Extraction → Preprocessing → Structured Mobile Data → Laravel Models → Search / Retrieval APIs → Web & Commerce Workflows`

It combines backend development, API design, relational data modeling, web scraping, information retrieval and e-commerce concepts in one repository.
