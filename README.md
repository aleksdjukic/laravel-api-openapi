# Laravel API + OpenAPI (Swagger)

This repository demonstrates a **production-style Laravel REST API**
documented with **OpenAPI 3.0 (Swagger)**.

The goal is to showcase:
- OpenAPI-driven API design
- CRUD operations with persistence
- Validation & Resources
- Versioned endpoints
- Realistic backend use case

## Architecture Overview

The application follows common backend best practices. Controllers act as thin HTTP adapters, validation is handled via dedicated Form Request classes, persistence is managed through Eloquent models, and all API responses are returned exclusively through Resource classes. Routing is RESTful and versioned.

Request flow: HTTP Request → Controller → Validation → Model → Resource → JSON Response.

## API Documentation (Swagger)

The API is fully documented using OpenAPI 3.0 annotations. Swagger UI provides endpoint descriptions, request body schemas, path parameters, response schemas, and HTTP status codes. Once generated, the documentation is available at `/api/documentation`.

## Running the Project Locally

Setup:
composer install
cp .env.example .env
php artisan key:generate

Database:
Configure database credentials in `.env`, then run:
php artisan migrate

Swagger:
Generate API documentation:
php artisan l5-swagger:generate

Run server:
php artisan serve

API base URL:
http://127.0.0.1:8000/api/v1

## Project Scope

This project focuses on application-layer API design. Authentication, frontend integration, and advanced infrastructure concerns are intentionally omitted to keep the emphasis on API structure, data flow, documentation, and code clarity.
