# Meridian — Roadmap

## Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 13 (PHP 8.2) |
| Frontend | Angular 17+ |
| Database | PostgreSQL 16 |
| Auth | Laravel Sanctum + 2FA (TOTP) |
| RBAC | Spatie Laravel Permission |
| Mail | Laravel Mail + SMTP |
| Containers | Docker + Docker Compose |
| CI/CD | GitHub Actions |
| Testing (API) | PHPUnit + Pest |
| Testing (Web) | Jasmine + Karma |

---

## Phase 1 — Foundation
> Setup base del proyecto, autenticación y estructura

- [ ] Configurar Laravel con PostgreSQL
- [ ] Configurar CORS para Angular
- [ ] Instalar y configurar Laravel Sanctum (tokens SPA)
- [ ] Instalar Spatie Laravel Permission
- [ ] Implementar registro e inicio de sesión (email + password)
- [ ] Implementar 2FA con TOTP (Google Authenticator / Authy)
- [ ] Middleware de autenticación en rutas protegidas
- [ ] Refresh token y manejo de sesión
- [ ] Setup Angular: routing, HTTP client, interceptors
- [ ] Auth guard en Angular (proteger rutas)
- [ ] Login page + 2FA page en Angular
- [ ] Manejo global de errores HTTP (401, 403, 500)

---

## Phase 2 — Usuarios y RBAC
> Gestión de usuarios y control de acceso basado en roles

- [ ] CRUD de usuarios (crear, editar, desactivar)
- [ ] Asignación de roles a usuarios
- [ ] Módulo de roles: crear, editar, eliminar roles
- [ ] Módulo de permisos: asignar permisos a roles
- [ ] Guards en Angular basados en permisos
- [ ] Directiva Angular para mostrar/ocultar elementos por permiso
- [ ] Perfil de usuario (cambiar contraseña, configurar 2FA)
- [ ] Reset de contraseña por email

---

## Phase 3 — Departamentos
> Estructura organizacional

- [ ] CRUD de departamentos
- [ ] Asignación de usuarios a departamentos
- [ ] Jerarquía de departamentos (departamento padre/hijo)
- [ ] Vista de organigrama en Angular

---

## Phase 4 — Expedientes
> Gestión de datos del empleado

- [ ] CRUD de expedientes de empleados
- [ ] Subida y gestión de documentos (PDF, imágenes)
- [ ] Historial de cambios por expediente
- [ ] Filtros y búsqueda avanzada
- [ ] Exportar expediente a PDF

---

## Phase 5 — Incidencias
> Registro de eventos e incidentes del empleado

- [ ] CRUD de incidencias
- [ ] Tipos de incidencia configurables
- [ ] Estatus de incidencia (abierta, en proceso, cerrada)
- [ ] Asignación de incidencia a usuario responsable
- [ ] Historial y trazabilidad por incidencia
- [ ] Notificaciones por email al cambiar estatus

---

## Phase 6 — Vacaciones
> Solicitud y aprobación de vacaciones

- [ ] Configuración de días disponibles por empleado
- [ ] Solicitud de vacaciones por parte del empleado
- [ ] Flujo de aprobación (pendiente → aprobada / rechazada)
- [ ] Notificación por email al aprobar/rechazar
- [ ] Calendario de vacaciones por departamento
- [ ] Reporte de vacaciones tomadas vs disponibles

---

## Phase 7 — Polish & Deploy
> Calidad, pruebas y despliegue

- [ ] Tests unitarios e integración en Laravel (Pest)
- [ ] Tests en Angular (componentes críticos)
- [ ] Dockerfiles de producción optimizados
- [ ] Variables de entorno documentadas en `.env.example`
- [ ] Pipeline CI/CD completo en GitHub Actions
- [ ] Documentación de API (Swagger / L5-Swagger)
- [ ] README final con instrucciones de setup
