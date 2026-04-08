# Project Guidelines

## Code Style
- PHP properties: camelCase (e.g., `$profilePhoto`)
- Entity classes: PascalCase, singular (e.g., `RendezVou`)
- Database columns: snake_case (e.g., `date_rendez_vous`)
- Reference: [src/Entity/User.php](src/Entity/User.php) for standard Doctrine entity pattern

## Architecture
Symfony 6.4 application for university psychological counseling system.
- Controllers: Attribute-based routing, auto-discovered
- Database: Doctrine ORM with entities auto-generated from MySQL schema
- Templates: Twig with role-based layouts (home/ for users, back/ for admins)
- Authentication: Email-based login with ROLE_ADMIN/ROLE_USER roles
- Key decision: Database-driven development - entities reverse-engineered from DB schema

## Build and Test
- Install dependencies: `composer install`
- Start server: `symfony server:start` (or `php -S localhost:8000 -t public/`)
- Run tests: `php bin/phpunit`
- Clear cache: `php bin/console cache:clear`
- Generate entities: `php bin/console app:generate:entities`
- Database: Ensure MySQL running at localhost:3306 (user=root, no password)

## Conventions
- Entity generation: Use the custom command to sync PHP classes from database schema
- Avoid modifying auto-generated entities directly (may be overwritten)
- Security: Plaintext password hashing configured for development - change to bcrypt/argon2id for production
- Session: File-based storage (suitable for development)
- Email: Disabled by default; use Docker Compose for Mailpit testing