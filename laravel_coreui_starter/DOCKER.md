# Docker Setup Guide

This guide explains how to build, run, and manage the CoreUI Laravel application using Docker.

## Prerequisites

- **Docker** ([Download](https://www.docker.com/products/docker-desktop))
- **Docker Compose** (included with Docker Desktop)

Verify installation:
```bash
docker --version
docker-compose --version
```

---

## Quick Start

### 1. Build the Docker Image

```bash
docker-compose build
```

This creates the application image by:
- Installing Node dependencies and building frontend assets (stage 1)
- Creating PHP-FPM + Nginx container with all PHP extensions (stage 2)

**Build time:** 3-5 minutes on first run, ~10 seconds on subsequent builds (cached layers).

### 2. Start Services

```bash
docker-compose up -d
```

This starts:
- **Application container** (PHP-FPM + Nginx) on `http://localhost:8000`
- **MySQL database** on `localhost:3306`

Both services are networked and can communicate internally.

**Wait for services to be healthy** (~10 seconds). Check:
```bash
docker-compose ps
```

Expected output:
```
CONTAINER ID    IMAGE                      STATUS          PORTS
xxxxx           coreui_laravel_app         Up (healthy)    0.0.0.0:8000->80/tcp
xxxxx           mysql:8.0                  Up (healthy)    0.0.0.0:3306->3306/tcp
```

### 3. Initialize Database

Run migrations:
```bash
docker-compose exec app php artisan migrate
```

Seed initial data (optional):
```bash
docker-compose exec app php artisan db:seed
```

### 4. Access the Application

Open browser:
```
http://localhost:8000
```

Create a test user via Tinker:
```bash
docker-compose exec app php artisan tinker
> User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password123')])
> exit()
```

Login with: `admin@example.com` / `password123`

---

## Common Tasks

### View Logs

**Application logs:**
```bash
docker-compose logs -f app
```

**Database logs:**
```bash
docker-compose logs -f mysql
```

**All services:**
```bash
docker-compose logs -f
```

Press `Ctrl+C` to exit logs.

### Run Artisan Commands

```bash
# Migrations
docker-compose exec app php artisan migrate

# Seeds
docker-compose exec app php artisan db:seed

# Generate app key
docker-compose exec app php artisan key:generate

# Tinker REPL
docker-compose exec app php artisan tinker

# Cache clearing
docker-compose exec app php artisan cache:clear
```

### Access MySQL

From host machine:
```bash
mysql -h 127.0.0.1 -u coreui_user -p
# Password: coreui_password
```

Or inside the container:
```bash
docker-compose exec mysql mysql -u coreui_user -p coreui_laravel
# Password: coreui_password
```

### Rebuild After Code Changes

If you modify `package.json`, `composer.json`, or Dockerfile:
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

### Stop Services

```bash
docker-compose stop
```

Services are paused but can be restarted with `docker-compose up -d`.

### Remove Everything (Clean Start)

```bash
docker-compose down -v
```

This removes containers, volumes, and networks. The next `docker-compose up` will recreate everything.

---

## Architecture

### Single Application Container (Minimal Setup)

```
┌─────────────────────────────────────┐
│  Docker Image (Alpine 3.x)         │
├─────────────────────────────────────┤
│  - PHP 8.2-FPM                      │
│  - Nginx (reverse proxy)            │
│  - Supervisor (process manager)     │
│  - Laravel + Dependencies            │
└─────────────────────────────────────┘
         ↕ (Docker Compose network)
┌─────────────────────────────────────┐
│  MySQL 8.0 Container               │
├─────────────────────────────────────┤
│  - Database server                  │
│  - Persistent data volume           │
└─────────────────────────────────────┘
```

**Why this approach?**
- ✅ Minimal — only 2 services (app + DB)
- ✅ Single app container avoids "container bloat"
- ✅ PHP-FPM + Nginx in same container = shared resources
- ✅ Easy to develop — all logs accessible
- ✅ Production-ready — Supervisor manages processes

### Build Stages

**Stage 1 (Builder):** Installs Node + builds frontend assets  
**Stage 2 (Final):** Copies built assets, installs PHP deps, creates runnable image

Benefits: Smaller final image, clean dependency management.

---

## Configuration

### Environment Variables

Edit `docker-compose.yml` to customize:

```yaml
environment:
  - APP_ENV=local              # Change to 'production' for prod
  - APP_DEBUG=true             # Set to 'false' for production
  - DB_PASSWORD=coreui_password   # Change for security
  - CACHE_DRIVER=file          # Use 'redis' if needed
```

### Port Mapping

Change app port in `docker-compose.yml`:
```yaml
ports:
  - "8080:80"  # Access on localhost:8080
```

### Database Credentials

Change in `docker-compose.yml`:
```yaml
environment:
  - MYSQL_DATABASE=my_db
  - MYSQL_USER=my_user
  - MYSQL_PASSWORD=my_secure_password
```

Then update `.env` accordingly.

---

## Development Workflow

### Live Code Editing

Code changes are reflected immediately (no rebuild needed):
```bash
# Edit file (IDE)
resources/views/dashboard/index.blade.php

# Refresh browser
http://localhost:8000/dashboard
```

**Why?** Volume mount: `.:/app` syncs code from host to container in real-time.

### Asset Pipeline

Frontend assets auto-rebuild when you modify SCSS/JS:
```bash
# Automatically detected by Vite via volume mount
resources/scss/app.scss  → auto-compiles to public/build/
resources/js/app.js      → auto-bundles to public/build/
```

**Note:** First build happens during Docker image build. Subsequent changes are detected immediately.

### Debugging

Access application from container:
```bash
docker-compose exec app bash

# Inside container:
# /app# php artisan tinker
# /app# composer install
# /app# ls -la
```

---

## Production Deployment

### Minimal Production Setup

1. **Use prod environment:**
   ```yaml
   APP_ENV=production
   APP_DEBUG=false
   ```

2. **Build production image:**
   ```bash
   docker build -t myapp:1.0 .
   docker tag myapp:1.0 myapp:latest
   ```

3. **Push to registry (Docker Hub, ECR, etc.):**
   ```bash
   docker tag myapp:latest username/myapp:latest
   docker push username/myapp:latest
   ```

4. **Deploy to server (e.g., Docker Swarm, K8s):**
   ```bash
   docker run -d \
     -p 80:80 \
     -e APP_ENV=production \
     -e DB_HOST=prod-mysql-server \
     -e DB_PASSWORD=${DB_PASSWORD} \
     username/myapp:latest
   ```

### Production docker-compose.yml

For deployment to a single server:

```yaml
version: '3.9'
services:
  app:
    image: myapp:latest
    ports:
      - "80:80"
    environment:
      - APP_ENV=production
      - APP_DEBUG=false
    restart: always
  mysql:
    image: mysql:8.0
    volumes:
      - mysql_data:/var/lib/mysql
    restart: always
volumes:
  mysql_data:
```

---

## Troubleshooting

### Issue: "Connection refused" when accessing MySQL

**Solution:**
```bash
docker-compose ps  # Verify MySQL is running
docker-compose logs mysql  # Check for errors
docker-compose restart mysql
```

### Issue: Port 8000 already in use

**Solution:** Change port in `docker-compose.yml`:
```yaml
ports:
  - "8001:80"  # Use 8001 instead
```

### Issue: "npm ci" fails during build

**Solution:** Clear Docker cache:
```bash
docker-compose build --no-cache
```

### Issue: Permission denied on storage/

**Solution:** Dockerfile sets correct permissions, but if issue persists:
```bash
docker-compose exec app chmod -R 775 storage bootstrap/cache
```

### Issue: Database not initializing

**Solution:**
```bash
docker-compose down -v  # Remove volumes
docker-compose up -d
docker-compose exec app php artisan migrate
```

### Issue: "Key file not found" - APP_KEY error

**Solution:**
```bash
docker-compose exec app php artisan key:generate
```

---

## Performance Tips

### Reduce Build Time

```bash
# Skip layer cache (fresh build)
docker-compose build --no-cache

# Use buildkit (faster)
DOCKER_BUILDKIT=1 docker-compose build
```

### Optimize Image Size

Current image: ~500MB (includes Node for builds)

For production, use slim variant:
```dockerfile
FROM php:8.2-fpm-alpine  # Already used
```

Alpine is already minimal (~15MB base).

### Database Optimization

Add indexes for frequently queried columns:
```php
// In migration
$table->index('user_id');
$table->index(['created_at', 'status']);
```

---

## Advanced: Multi-Container Setup (Optional)

If you need Redis, Queue Worker, or Scheduler separately, extend `docker-compose.yml`:

```yaml
services:
  app:
    # ... existing config
    
  mysql:
    # ... existing config
    
  redis:
    image: redis:7-alpine
    container_name: coreui_redis
    ports:
      - "6379:6379"
    networks:
      - laravel-network
      
  queue-worker:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: coreui_queue
    command: php artisan queue:work
    depends_on:
      - app
      - redis
    networks:
      - laravel-network
```

Then in app environment:
```yaml
CACHE_DRIVER=redis
REDIS_HOST=redis
```

---

## Resources

- **Docker Docs:** https://docs.docker.com/
- **Docker Compose Docs:** https://docs.docker.com/compose/
- **Laravel in Docker:** https://laravel.com/docs/deployment
- **PHP Docker Hub:** https://hub.docker.com/_/php

---

## Quick Reference

| Task | Command |
|------|---------|
| Build image | `docker-compose build` |
| Start services | `docker-compose up -d` |
| Stop services | `docker-compose stop` |
| View logs | `docker-compose logs -f app` |
| Run migration | `docker-compose exec app php artisan migrate` |
| Seed database | `docker-compose exec app php artisan db:seed` |
| Access bash | `docker-compose exec app bash` |
| Remove all | `docker-compose down -v` |

---

Good luck! 🐳
