# Docker Setup Guide

This guide explains how to build, run, and manage the current Docker setup for the LOGIFY admin panel.

## Current State

Verified on: 2026-04-23

- Compose services: `app`, `web`
- Container names: `logify-app`, `logify-web`
- Public app URL: `http://localhost:8000`
- Database model: external MySQL (not a Compose-managed `mysql` service)
- DB host inside containers: `host.docker.internal`

## Prerequisites

- Docker Desktop
- Docker Compose plugin (`docker compose` command)

Verify installation:

```bash
docker --version
docker compose version
```

## Quick Start

### 1. Build Images

```bash
docker compose build
```

### 2. Start Services

```bash
docker compose up -d
```

### 3. Check Health and Status

```bash
docker compose ps
```

Expected services:

- `logify-app` (application runtime)
- `logify-web` (Nginx service exposed on port 8000)

### 4. Run App Initialization

```bash
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
```

### 5. Access the Application

Open:

`http://localhost:8000`

## Compose Services Overview

### app

- Built from `Dockerfile` target `app`
- Loads environment from `.env.docker`
- Uses `host.docker.internal` mapping to reach host services

### web

- Built from `Dockerfile` target `web`
- Depends on `app` health
- Maps host port `8000` to container port `80`

## Database Notes

This Docker setup does not define a database service in `docker compose`.

- Configure and run MySQL on the host or another reachable endpoint
- Keep `.env.docker` aligned with your DB endpoint
- Default `.env.docker` values:
  - `DB_CONNECTION=mysql`
  - `DB_HOST=host.docker.internal`
  - `DB_PORT=3306`
  - `DB_DATABASE=coreui_db`
  - `DB_USERNAME=coreui_user`
  - `DB_PASSWORD=coreui_secret`

## Common Tasks

### View Logs

```bash
docker compose logs -f app
docker compose logs -f web
docker compose logs -f
```

### Run Artisan Commands

```bash
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
docker compose exec app php artisan cache:clear
docker compose exec app php artisan tinker
```

### Access Container Shell

```bash
docker compose exec app sh
```

### Rebuild After Dependency or Dockerfile Changes

```bash
docker compose down
docker compose build --no-cache
docker compose up -d
```

### Stop and Cleanup

```bash
docker compose stop
docker compose down
docker compose down -v
```

## Platform Command Matrix

### Open Application URL

- Windows PowerShell: `Start-Process http://localhost:8000`
- macOS: `open http://localhost:8000`
- Linux: `xdg-open http://localhost:8000`

### Reach Host MySQL from Container

- Windows/macOS Docker Desktop: use `host.docker.internal`
- Linux Engine: set `DB_HOST` to host bridge IP if `host.docker.internal` is unavailable

## Troubleshooting

### App not reachable on port 8000

```bash
docker compose ps
docker compose logs --tail=200 web
```

If another process is using port 8000, update port mapping in `docker-compose.yml` and recreate containers.

### App container unhealthy

```bash
docker compose logs --tail=200 app
docker compose restart app
```

### Database connection errors

1. Verify DB server is running and reachable from host.
2. Confirm `.env.docker` credentials and host.
3. Re-run migrations after connectivity is fixed:

```bash
docker compose exec app php artisan migrate
```

## Verification Checklist

- [ ] `docker compose ps` shows both `app` and `web` running
- [ ] `http://localhost:8000` loads
- [ ] `docker compose exec app php artisan migrate` succeeds
- [ ] `docker compose exec app php artisan tinker` opens successfully
- [ ] `docker compose logs -f web` shows healthy request handling

## Command Standard

Use `docker compose` (plugin form) in all project documentation and examples.

## Related Docs

- `DOCKER_QUICK_REFERENCE.md`
- `SETUP.md`
- `ARCHITECTURE.md`
