---
name: crud-module
description: >
  **LOGIFY CRUD MODULE STANDARD** — Full step-by-step scaffolding for any
  Create/Read/Update/Delete module in this Laravel 11 + Blade + CoreUI project.
  USE WHENEVER: generating a new module, list page, add form, edit form,
  soft-delete or deactivate, restore, data table, filter, paginated table,
  or any feature triggered by keywords: "create module", "CRUD", "list page",
  "add form", "edit form", "delete record", "data table", "filter",
  "soft delete", "restore", "deactivate", "activate", "manage".
  Covers: migration, model, controller, views (index/create/edit),
  routes, navigation, permissions, ActivityLog, seeder, and Docker rebuild.
  DO NOT skip steps silently — complete all that apply.
argument-hint: 'Name the module (e.g. "Settings", "Roles") and any special behaviour'
---

# CRUD Module Standards
 
This skill defines the **project-wide conventions** for all CRUD modules.
Apply every rule here to every module generated, regardless of the entity or context.
 
---
 
## Project Template
 
- The project has a `template/` folder containing a **CoreUI template**.
- All UI components (tables, forms, cards, buttons, modals, badges, alerts, etc.)
  **must** be sourced from this CoreUI template.
- Do **NOT** use components or styles from any other UI library.
- Do **NOT** write custom CSS unless the CoreUI template does not cover the specific use case.
- Always refer to the `template/` folder as the **single source of truth** for
  component structure and class naming conventions.
---
 
## 1. Table / List View
 
- Use **DataTables** for all tabular data. It handles pagination, sorting, and search natively.
- Place a **General Filter Card** above the table. The filter card should contain
  relevant filter fields for the module (e.g., status, date range, category).
  Use CoreUI's card component for the filter card.
- Table rows must be **clickable** to open the record's detail/edit view.
  - Attach a click handler to each `<tr>` element.
  - Do **NOT** add a separate "View" or "Open" action button/column.
- Other action buttons (Edit, Delete, Restore) may still appear in an actions column
  where applicable.
---
 
## 2. Add & Edit Form
 
- Use a **single shared form component** for both Add and Edit actions.
- The form must detect its own context:
  - **Add mode**: all fields are empty, form submits to the create endpoint.
  - **Edit mode**: fields are pre-populated with existing record data, form submits
    to the update endpoint.
- Do **NOT** create separate Add and Edit form files or components.
  Any change to field layout, labels, or validation must only need to be done **once**.
- Use CoreUI form components (inputs, selects, textareas, validation states) consistently.
---
 
## 3. Delete — Soft Delete with Restore
 
- All deletes must be **soft deletes**:
  - Use a `deleted_at` timestamp column (nullable) on the database table.
  - A record is considered deleted when `deleted_at` is not null.
  - Records are **never permanently removed** via normal delete actions.
- Deleted records must be **restorable** by an authorized user:
  - Provide a "Restore" action for soft-deleted records.
  - Restoring a record sets `deleted_at` back to null.
- Provide a way to view soft-deleted records, such as:
  - A "Show Deleted" toggle or filter in the General Filter Card, **or**
  - A separate "Trash" tab/view within the module.
- Use CoreUI badge or status indicators to visually distinguish deleted records
  when they are shown in the table.
---
 
## Quick Reference
 
| Feature              | Standard                                          |
|----------------------|---------------------------------------------------|
| Table Library        | DataTables                                        |
| Filter UI            | General Filter Card (CoreUI card, above table)    |
| Row Interaction      | Clickable row — no separate View button           |
| Add & Edit Form      | Single shared form component (context-aware)      |
| Delete Behavior      | Soft delete via `deleted_at` timestamp            |
| Restore              | Required — restore action sets `deleted_at` null  |
| All UI Components    | CoreUI template (`template/` folder)              |
 
---
 
## Rules
 
1. Never deviate from these patterns unless the user explicitly overrides a specific rule.
2. Apply these standards to **every** CRUD module generated in this project.
3. When in doubt about a component's markup or class names, refer to the `template/` folder.
 