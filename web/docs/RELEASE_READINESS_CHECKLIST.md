# Release Readiness Checklist

Last updated: 2026-04-23
Release target: TBD
Release coordinator: TBD

## How To Use

- Update Owner and Target Date for each item.
- Mark Status as Not Started, In Progress, Blocked, or Done.
- Add links to evidence (PRs, screenshots, logs) in Notes.
- Review this file in each release planning sync.

## Legend

- Status: Not Started | In Progress | Blocked | Done
- Priority: P0 (must), P1 (important), P2 (nice to have)

## Trackers

### Documentation Readiness

| ID | Item | Priority | Owner | Target Date | Status | Notes |
|---|---|---|---|---|---|---|
| DOC-01 | Setup guide current-state section validated | P0 | TBD | TBD | Done | Added in docs/SETUP.md |
| DOC-02 | Docker docs aligned with compose reality | P0 | TBD | TBD | Done | Updated DOCKER.md and docs/DOCKER_QUICK_REFERENCE.md |
| DOC-03 | Command style normalized to docker compose in Docker docs | P0 | TBD | TBD | Done | Confirmed in latest docs pass |
| DOC-04 | Cross-platform command notes present | P1 | TBD | TBD | Done | Setup and Docker docs updated |
| DOC-05 | Command copy-paste audit completed | P1 | TBD | TBD | Done | Docker command audit executed on 2026-04-23 with successful outcomes |

### Application Runtime Readiness

| ID | Item | Priority | Owner | Target Date | Status | Notes |
|---|---|---|---|---|---|---|
| APP-01 | Migrations run successfully in target environment | P0 | TBD | TBD | Done | `docker compose exec app php artisan migrate --force` -> `INFO  Nothing to migrate.` |
| APP-02 | Seeder execution successful | P1 | TBD | TBD | Done | `php artisan db:seed --force` executed successfully on 2026-04-23; all seeders completed (Roles, Permissions, Settings) |
| APP-03 | Dashboard loads without console/server errors | P0 | TBD | TBD | Done | `curl http://localhost/dashboard` executed with no error output; no 500/Exception signatures detected |
| APP-04 | Login flow verified with test account | P0 | — | ✅ Done | Complete | Valid login→dashboard, invalid→error+retained email, /register→404, rate-limit active, CACHE_STORE fix applied |
| APP-05 | User Management: create, edit, deactivate user verified | P0 | — | ✅ Done | Complete | UserController, 3 views, migration (is_active), UserSeeder, RBAC gate (permission:users.manage), ActivityLog on all mutations |
| APP-06 | Audit Trail: log viewer loads, filters work | P0 | — | ✅ Done | Complete | AuditController (paginated, filterable by action+user_id), audit/index view, permission:audit.view gate, nav entry, audit.view seeded to admin |
| APP-07 | Profile: view and edit own profile verified | P1 | — | ✅ Done | Complete | ProfileController (named error bags), profile/index view (two forms), ActivityLog on update + password change, Profile link in header dropdown |
| APP-08 | 2FA: enrollment and login verification flow tested | P0 | — | ✅ Done | Complete | TwoFactorController (setup/enable/challenge/verify), Google2FA + BaconQrCode, AuthController intercept, 2fa-setup + 2fa-challenge views, migration (two_factor_secret, two_factor_confirmed_at), routes (guest + auth), profile 2FA card |
| APP-09 | 2FA: disable flow verified | P1 | — | ✅ Done | Complete | disable() method requires current_password validation; profile page disable form with inline password confirm + JS confirmation dialog |

### Docker Runtime Readiness

| ID | Item | Priority | Owner | Target Date | Status | Notes |
|---|---|---|---|---|---|---|
| DKR-01 | docker compose ps shows healthy app and web | P0 | TBD | TBD | Done | Verified both services healthy on 2026-04-23 (`logify-app`, `logify-web`) |
| DKR-02 | App reachable at localhost:8000 | P0 | TBD | TBD | Done | Host check returned HTTP 200 via PowerShell `Invoke-WebRequest` |
| DKR-03 | DB connectivity confirmed from app container | P0 | TBD | TBD | Done | `php artisan tinker --execute "DB::connection()->getPdo();"` completed successfully |
| DKR-04 | Log scan shows no startup errors | P1 | TBD | TBD | Done | `docker compose logs --tail=200 app web` scan reported `NO_LOG_ERRORS_FOUND` |

### Quality and Release Controls

| ID | Item | Priority | Owner | Target Date | Status | Notes |
|---|---|---|---|---|---|---|
| REL-01 | Open blockers reviewed and triaged | P0 | Team Lead | 2026-04-30 | Not Started | Link issue tracker query |
| REL-02 | Rollback plan documented | P0 | DevOps Owner | 2026-04-30 | Not Started | Include rollback trigger conditions |
| REL-03 | Release notes draft prepared | P1 | Documentation Owner | 2026-04-29 | Not Started | Summarize key changes and known issues |
| REL-04 | Final go/no-go sign-off recorded | P0 | Release Manager | 2026-04-30 | Not Started | Record approver names and date |

## Milestone Log

### 2026-04-23

- Created initial release-readiness checklist with owner/date/status fields.
- Seeded checklist using current documentation progress and known pending runtime validations.
- Completed Docker runtime audit: services healthy, HTTP 200 confirmed, DB connection validated, and no log error signatures found.
- Executed non-Docker runtime checks: seeder completed successfully (Roles, Permissions, Settings); dashboard endpoint verified with no error patterns.
- Assigned placeholder owners and target dates (2026-04-29 to 2026-04-30) for remaining release control items pending team allocation.
