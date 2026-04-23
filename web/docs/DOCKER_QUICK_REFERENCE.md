# Docker Quick Reference

Copy-paste commands for common Docker tasks.

Current setup snapshot (verified 2026-04-23):
- Services: app, web
- Containers: logify-app, logify-web
- Database: external MySQL (no mysql compose service)

## First Time Setup

```bash
# Build images
docker compose build

# Start services
docker compose up -d

# Check status
docker compose ps

# View startup logs
docker compose logs -f app
docker compose logs -f web
```

Open app URL:

- Windows PowerShell: Start-Process http://localhost:8000
- macOS: open http://localhost:8000
- Linux: xdg-open http://localhost:8000

## Daily Development

```bash
# Start services
docker compose up -d

# Watch logs
docker compose logs -f app

# Run artisan command
docker compose exec app php artisan [command]

# Typical commands
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed

# Stop services
docker compose stop
```

## Database (External)

```bash
# Access MySQL from host machine
mysql -h 127.0.0.1 -P 3306 -u coreui_user -p coreui_db
# Password: coreui_secret

# Verify DB connectivity from app container
docker compose exec app php artisan tinker
> DB::connection()->getPdo();
> exit()
```

## Debugging

```bash
# Interactive shell
docker compose exec app sh

# Tail logs
docker compose logs --tail=200 app
docker compose logs --tail=200 web

# Rebuild images without cache
docker compose build --no-cache

# Resource usage
docker stats
```

## Asset Commands

```bash
docker compose exec app npm run build
docker compose exec app npm run dev
```

## Cleanup

```bash
# Stop only
docker compose stop

# Remove containers and network
docker compose down

# Full cleanup (includes volumes)
docker compose down -v

# Remove unused images
docker image prune

# Remove all unused Docker resources (careful)
docker system prune -a
```

## Command Standard

Use docker compose in all commands and scripts.

For full context and troubleshooting, see DOCKER.md.
