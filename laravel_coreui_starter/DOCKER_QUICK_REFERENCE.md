# Docker Quick Reference

Copy-paste commands for common Docker tasks.

## First Time Setup

```bash
# Build the Docker image
docker-compose build

# Start all services
docker-compose up -d

# Check if services are healthy
docker-compose ps

# View initialization logs
docker-compose logs -f app
```

Services will be ready in ~30 seconds. Then:

```bash
# Access the application
open http://localhost:8000

# Create test user
docker-compose exec app php artisan tinker
> User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password123')])
> exit()

# Login with admin@example.com / password123
```

## Daily Development

```bash
# Start services (if not already running)
docker-compose up -d

# View logs
docker-compose logs -f app

# Run artisan commands
docker-compose exec app php artisan [command]

# Access database
docker-compose exec mysql mysql -u coreui_user -p coreui_laravel

# Run migrations
docker-compose exec app php artisan migrate

# Stop services
docker-compose stop

# Clean restart
docker-compose down -v
docker-compose up -d
```

## Debugging

```bash
# Interactive bash in app container
docker-compose exec app bash

# Check health
docker-compose exec app curl http://localhost/health

# View all logs
docker-compose logs

# Rebuild without cache
docker-compose build --no-cache

# Check container resource usage
docker stats
```

## Database

```bash
# Direct MySQL access from host
mysql -h 127.0.0.1 -u coreui_user -p
# Password: coreui_password

# Backup database
docker-compose exec mysql mysqldump -u coreui_user -p coreui_laravel > backup.sql
# Password: coreui_password

# Restore database
docker-compose exec -T mysql mysql -u coreui_user -p coreui_laravel < backup.sql
# Password: coreui_password
```

## Asset Management

```bash
# Rebuild frontend assets
docker-compose exec app npm run build

# Watch for changes (in app container via compose)
docker-compose exec app npm run dev
```

## Cleanup

```bash
# Stop but keep data
docker-compose stop

# Stop and remove containers/networks
docker-compose down

# Full clean (remove volumes too)
docker-compose down -v

# Remove unused images
docker image prune

# Remove everything (⚠️ nuclear option)
docker system prune -a
```

## Production Deployment

```bash
# Build production image
docker build -t myapp:1.0 .

# Tag for registry
docker tag myapp:1.0 registry.example.com/myapp:1.0

# Push to registry
docker push registry.example.com/myapp:1.0

# Run on production server
docker run -d \
  -p 80:80 \
  -e APP_ENV=production \
  -e APP_DEBUG=false \
  -e DB_HOST=prod-db.example.com \
  registry.example.com/myapp:1.0
```

For more details, see [DOCKER.md](DOCKER.md).
