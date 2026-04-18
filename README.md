# Meridian

Internal HR management system built with Laravel + Angular.

## Modules
- Users & Authentication (2FA)
- Role-Based Access Control (RBAC)
- Departments
- Employee Records (Expedientes)
- Incidents (Incidencias)
- Vacations (Vacaciones)

## Stack
- **API:** Laravel 11, PostgreSQL
- **Web:** Angular 17+
- **Infra:** Docker

## Getting started

```bash
cp .env.example .env
docker compose up -d
```

## Project structure

```
apps/
├── api/   # Laravel REST API
└── web/   # Angular SPA
docs/      # Architecture, API, Database docs
infra/     # Docker, deployment scripts
.github/   # CI/CD workflows
```
