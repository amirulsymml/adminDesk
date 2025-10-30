# HelpDesk MVP Task List (from PRD)

## 🚀 Current Progress (Updated)

### ✅ Completed Tasks
- **Migrations Fixed**: Removed `parent_department_id` from categories migration; Updated `customer_id` in tickets migration to reference `users` table
- **Models Enhanced**: Removed `ParentDepartment` model; Enhanced `Department` and `Ticket` models with proper Eloquent relationships
- **Form Requests Created**: Comprehensive request classes for all models (TicketRequest, CommentRequest, CategoryRequest, DepartmentRequest, PriorityRequest, StatusRequest, TypeRequest, UserRequest)
- **Controllers Implemented**: Full CRUD for all controllers using form requests:
  - TicketController and CommentController
  - CategoryController, DepartmentController, PriorityController, StatusController, TypeController
  - UserController with proper password hashing and validation
  - **Admin Routing Fixed**: Resolved "Target class [role] does not exist" error by reverting to `CheckUserRole` middleware with explicit `:admin` parameter and clearing corrupted route cache.
- **Resourceful Routing**: Updated all routes to use proper resourceful routing with auth middleware protection
14: - ✅ Integrate Tailwind CSS components into `tickets/index.blade.php` and `tickets/show.blade.php`

---

This plan reflects the PRD and the current repository state. It follows Laravel best practices: resource controllers, form requests, route model binding, policies for authorization, queued notifications/mails, Eloquent relationships, migrations with foreign keys and indexes, seeders/factories, pagination and eager loading, clear Blade layouts/components, proper validation and security, and environment-driven configuration.

## Notes on Current Repo State (Gaps to Address)
- `tickets` migration references `customers` table, which is not present. Decide to either:
  - Use `users` table with `role = customer`, or
  - Create a dedicated `customers` table and model.
- `departments` migration references `parent_departments` (table not shown). Either add migration/model, or remove/replace with self-referencing parent.
- Views link issues:
  - ✅ Resolved: `resources/views/configuration/priority.blade.php` and `type.blade.php` “Create New …” links now correctly point to their own create routes.```
- ✅ Ticket Management: Create, view, update, and close tickets.
- ✅ CommentController with full CRUD + validation.
- ✅ Comments: Model, controller, and partial views verified for CRUD operations.
- ✅ UserController with full CRUD + validation.```
- ✅ PriorityController with full CRUD + validation.
- ✅ StatusController with full CRUD + validation.
- ✅ TypeController with full CRUD + validation.
- ✅ Ticket Components: Department and Category models, controllers, and views verified for CRUD operations.
```- ✅ Resolved: Missing create views for `types` and `priorities` are now implemented.- ✅ Resolved: `status.blade.php` now correctly displays the 'Slug' column, and the `Status` model and migration are updated. - ✅ Auth: Laravel Breeze adopted for authentication.
- ✅ File Uploads: Attachment model, TicketController file handling, and partial views verified for CRUD operations.
- ✅ Email Notifications: New ticket and ticket update notifications implemented.
- ✅ Search & Filter: Search by subject/description, filtering by various criteria, and 'Clear Filters' button implemented.

---

## 1) Project Bootstrap & Environment
- Set base `.env` values for local dev (`APP_ENV=local`, `APP_DEBUG=true`, `DB_CONNECTION=sqlite`, `QUEUE_CONNECTION=database`, `SESSION_DRIVER=database`).
- Ensure `database/database.sqlite` exists and permissions are correct.
- Run initial migrations and seeding.
- Run `php artisan storage:link` for file uploads.
47: - Confirm Vite build and Tailwind CSS assets load via `@vite` in `layouts`.
- Configure queues: migrate jobs tables (`jobs`, `failed_jobs`, `job_batches`), start worker for local dev.
- Configure log channels and levels via `config/logging.php`.

## 2) Authentication & Authorization
- Choose auth approach:
  - Preferred: Install Laravel Breeze for login/register/password reset, or
  - Continue custom login and add a secure registration + password reset flow.
- Roles: use `role` on `users` (`admin`, `agent`, `customer`); enforce in middleware/policies.
- Add policies for `Ticket` and `Comment` (e.g., customers can only view/update their tickets; admins/agents can manage all).
- Protect app routes with `auth` and fine-grained `can:*` gates.
### ✅ Policies and role protections.

## 3) Domain Models & Migrations
### ✅ Domain Models & Migrations

### ✅ Seeders & Factories
### ✅ Seeders & Factories
- Seed base data:
  - Departments: IT, Finance, HR, Support.
  - Priorities: Low, Medium, High, Urgent.
  - Statuses: Open, In Progress, Pending, Resolved, Closed.
  - Types: Incident, Service Request, Task, Change.
- Create factories for `User`, `Ticket`, `Comment` to generate demo data.
- Update `DatabaseSeeder` to call individual seeders.

### ✅ Controllers & Routes (Resourceful)

75: ## 6) Views & Blade Components (Tailwind CSS)
- ✅ Standardize layout in `layouts/app.blade.php` and `layouts/guest.blade.php`.
- ✅ Create/complete forms:
    - `forms/create_type.blade.php`, `forms/create_priority.blade.php`, `forms/create_status.blade.php`, etc.
    - Edit forms for each configuration entity.
- Ticket pages:
  - **Ticket Flow, Comments, Attachments**:
    - Implemented index with filters, pagination, status/priority/type badges.
    - Create/edit forms with validation errors and CSRF.
    - Show page with ticket metadata, attachments, and comments thread.
    - Comments partials with add-comment form.
    - Used Laravel best practices.
- Replace incorrect “Create New …” links in priority/type views to point to proper routes.
- Introduce reusable Blade components for inputs, selects, badge, flash messages.

## 7) Ticket Lifecycle & Business Logic
- Create ticket: set `open_date` automatically.
- Update ticket: allow changing priority, status, type, assigned agent.
- Close ticket: set final status, `due_date` if relevant, lock edits except comments.
- Attachments: accept images/docs; validate MIME/type/size; store in `storage/app/public`; show previews/links.
- Eloquent relationships: define on models (`belongsTo`, `hasMany`), eager load in controllers.
- Add scopes for filtering (e.g., `scopeStatus`, `scopePriority`).

## 8) Comments
- Add `CommentController@store` using form request.
- Only ticket participants (customer, assigned agent, admins) can comment.
- Show newest-first with timestamps; support basic markdown or plain text.

## 9) Notifications & Email (Optional per PRD)
- Use Laravel Notifications/Mailables for:
  - New ticket created (notify admins/agents).
  - Ticket status/assignment updates (notify customer).
- Use queues for sending emails; configure SMTP (Mailtrap/Gmail/SendGrid) via `.env`.

## 10) Search & Filter
- Implement index filters for tickets by department, priority, status, type, date range.
- Add full-text–like search on subject/description (basic `LIKE` for MVP).
- Persist filter state via query string; include “Clear Filters”.

## 11) Dashboard
- ✅ Dashboard: Summary cards, charts, and recent activity feed implemented.

## 12) API (Optional)
- Add `routes/api.php` endpoints for tickets and comments.
- Protect with Laravel Sanctum.
- Return paginated JSON with filters identical to web.

## 13) Access Control & Security
- Policies: Ticket and Comment — view/update/delete rules by role and ownership.
- Validation: strict file validation, size limits, disallow HTML if necessary.
- XSS/CSRF: Blade escapes; use `@csrf` and avoid unsafe rendering.
- Rate limit auth endpoints (login) and comment posting.

## 14) Performance & UX
- Eager load relationships in list views to avoid N+1.
- Paginate ticket lists.
- Cache configuration lookups (statuses, priorities, types) when appropriate.

## 15) Testing
- Unit tests: models, scopes, policies.
- Feature tests: ticket CRUD, comment posting, filters.
- Use in-memory sqlite per `phpunit.xml`.
- Factories for deterministic fixtures.

## 16) Dev Tooling & CI/CD
- Run Pint for code style.
- Consider GitHub Actions: run `composer install`, `phpunit`, and `npm run build`.
- Add a simple deploy guide for Render/Railway.

## 17) Deployment
- Render/Railway setup: build & start commands, environment vars.
- Ensure writable `storage/` and `bootstrap/cache/`.
- Configure cache/queue/session drivers for production.

## 18) Documentation
- Update `README.md` with setup, credentials for demo, feature list.
- Include screenshots (optional) and API docs (if API enabled).

---

## Detailed Subtasks by Area

### Auth & Users
- Install or finalize Breeze scaffolding; wire up views to Breeze routes.
- Implement role-aware navigation and hide configuration menu for non-admins.
- Add password resets and email verification (optional).

### Models & Migrations
- Create missing migrations: `statuses`, `types`, `categories` (with `department_id`), parent departments or self-referencing departments.
- Fix `tickets.customer_id` foreign to use `users` or create `customers` table.
- Add `slug` to `statuses`; generate from name via observer or mutator.
- Add indexes on foreign keys and frequently filtered fields.

### Controllers & Requests
- Implement `TicketController` methods with `StoreTicketRequest` and `UpdateTicketRequest`.
- Implement `CommentController@store` with `StoreCommentRequest`.
- Complete CRUD for configuration controllers (`CategoryController`, `DepartmentController`, `PriorityController`, `StatusController`, `TypeController`).

### Views & Components
- Build create/edit forms for config entities; show validation errors.
- Ticket index: filters, badges, pagination, search input.
- Ticket show: details, attachments, comments list and form.
- Create Blade components for inputs/selects/badges/alerts.

### Notifications
- Create `NewTicketNotification`, `TicketUpdatedNotification`.
- Queue notifications; configure mail transport via `.env`.

### Files
- Add attachment upload handling in `TicketController@store/update`.
- Validate size/MIME; store in public disk; list attachments on show page.

### Policies & Security
- Create `TicketPolicy`, `CommentPolicy` with role and ownership checks.
- Register policies in `AuthServiceProvider`.
- Add rate limiting to login and comments.

### Testing
- Write tests for ticket creation, filtering, policy enforcement, comments.
- Use factories and in-memory sqlite per `phpunit.xml`.

### Dashboard
197: - Implement counts and recent items; optional chart (Tailwind CSS-compatible).

### API (Optional)
- Add sanctum and create ticket/comment endpoints; mirror filters.

---

## Acceptance Criteria (Per PRD)
- Customers can submit and track tickets; add comments and attachments.
- Admins/agents can view all tickets, update fields, and close tickets.
- Ticket list supports filtering by department/priority/status/type and search.
- Dashboard shows counts and basic insights.
- Optional emails sent on new tickets and updates; queued and configurable via `.env`.

## Risks & Mitigations (Recap)
- Email config complexity → Start with Mailtrap, then Gmail/SendGrid.
- SQLite performance limits → OK for MVP; switch to MySQL/PostgreSQL when scaling.
- Security (uploads/auth) → Strict validation, policies, middleware.
- Time constraints → Prioritize core CRUD/UI; defer optional API/charts if needed.

---

## Execution Order (Suggested)
1. Bootstrap & environment; queue tables; storage link.
2. Migrations and models (fix tickets/customer and departments parent).
3. Seeders/factories.
4. Controllers + requests + routes.
5. ✅ Views/forms/components; fix broken links.
6. ✅ Ticket flow, comments, attachments.
7. ✅ Filters/search/pagination.
8. Policies and role protections.
9. ✅ Notifications (optional) and dashboard.
10. Testing, CI, documentation.
11. Deployment.


# New executing order:
1. Routes to all page inside 'views/configuration' folder.

**End of plan.**