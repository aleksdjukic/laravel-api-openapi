# Changelog

All notable changes to this project are documented in this file.  
This project follows the principles of [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

---

## [1.1.0] – API Testing & Developer Experience Improvements

### Added
- Postman collection for easier API testing and validation
- Feature tests covering core API endpoints
- Improved test structure for maintainability and clarity
- Example request/response flow aligned with OpenAPI specification

### Improved
- API reliability through automated testing
- Developer experience when onboarding or reviewing the project
- Consistency between OpenAPI documentation and actual API behavior

### Scope
This release focuses on **API usability, testing, and developer experience**.  
It ensures the API is easily testable, well-documented, and suitable for further extension.

---

## [1.0.0] – Initial Stable Release

### Added
- Versioned REST API under `/api/v1`
- CRUD endpoints with database persistence
- Request validation using Laravel Form Requests
- Consistent JSON responses via API Resources
- OpenAPI 3.0 documentation with Swagger UI
- GitHub Actions CI workflow for build, documentation and tests

### Scope
This release focuses on **application-layer API design and documentation**.

Authentication, frontend integration, and infrastructure concerns are intentionally out of scope.
