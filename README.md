# Individual Assignment: Dashboard & RBAC Implementation

## Project Overview

This project is an extension of an existing Laravel-based academic portal. The implementation includes AdminLTE dashboard integration, Laravel Breeze authentication, and Role-Based Access Control (RBAC) using Spatie Laravel Permission. The system is designed to provide clearly differentiated access permissions between Admin and Staff roles.

**Technologies Used:**
- Laravel Framework ^13.17
- AdminLTE v4.0.1 (via `jeroennoten/laravel-adminlte`)
- Laravel Breeze ^1.29.1
- Spatie Laravel Permission ^8.5.0
- PHP ^8.3
- SQLite (default database)

---

## Implemented Features

### 1. AdminLTE Dashboard

- Dashboard uses the AdminLTE layout integrated with Laravel.
- Dashboard is accessible through the `/admin/dashboard` route.
- Displays 4 dynamic statistics widgets:
  - Total Users (calculated from the `users` table).
  - Total Academic Records (calculated from the `academic_data` table).
  - Total Roles (calculated from Spatie's `roles` table).
  - Total Permissions (calculated from Spatie's `permissions` table).
- All statistics are retrieved from actual database queries using the `count()` method.

### 2. Laravel Breeze Authentication

- Complete login, registration, and logout functionality.
- `auth` and `verified` middleware protect restricted pages.
- Admin login: `admin@demo.local` / `password123`
- Staff login: `staf@demo.local` / `password123`
- Auto-login buttons are available on the login page for development/testing purposes.

### 3. Spatie Roles and Permissions

**Roles:**
- `admin` – Has full access to all application features.
- `staf` – Has limited access according to assigned permissions.

**Permissions:**
- `view dashboard` – View the dashboard.
- `view data` – View academic records.
- `create data` – Add academic records.
- `edit data` – Edit academic records.
- `delete data` – Delete academic records (Admin only).
- `manage users` – Manage users (Admin only).

### 4. Differences Between Admin and Staff Access

| Feature | Admin | Staff |
|---|---|---|
| View dashboard | ✅ | ✅ |
| View academic data | ✅ | ✅ |
| Add academic data | ✅ | ✅ |
| Edit academic data | ✅ | ✅ |
| Delete academic data | ✅ | ❌ |
| Manage users | ✅ | ❌ |
| Direct URL access | ✅ | ❌ (returns HTTP 403) |
| Delete button in Blade | ✅ Visible | ❌ Hidden |

### 5. Blade-Level Access Control

- Admin-exclusive elements, particularly delete buttons and user management menus, are only displayed to users with the Admin role.
- Uses Blade directives such as `@can('delete data')` and `@role('admin')`.
- Delete functionality is protected through three layers:
  - **Blade:** Hides the delete button.
  - **Route:** Restricts access using middleware.
  - **Controller:** Performs server-side authorization checks.

### 6. Route Protection

- Sensitive routes are protected using `permission:` middleware in the controller constructor.
- Admin routes are grouped under `auth` and `verified` middleware.
- Auto-login routes are only available in the `local` or `testing` environments.

### 7. Dynamic Statistics Widgets

- At least 3 dynamic statistics widgets are required (4 have been implemented).
- Each widget uses a `Model::count()` query to retrieve actual database record counts.
- Statistics are passed from the Controller to the Blade view.

### 8. Search Functionality Using `when()`

- A search form is available on the academic data page.
- Uses Laravel's conditional query method `when()`.
- Supports searching by name, student ID (NIM), or study program.
- Search parameters are preserved when navigating between pages using `withQueryString()`.

### 9. Pagination Using `withQueryString()`

- Pagination displays 10 records per page.
- Uses `->paginate(10)->withQueryString()` to preserve search parameters.
- When navigating between pages, the search keyword remains available in the URL.

### 10. Faker Dummy Data Seeder

- Automatically generates 50 dummy academic records using Faker.
- Generated data includes: name, student ID (NIM), study program, faculty, enrollment year, email, address, and GPA.
- Creates demo Admin and Staff accounts with their respective roles and permissions.

### 11. Auto-Login Test Accounts

- Provides instant login buttons for development/testing purposes.
- Admin auto-login authenticates the `admin@demo.local` account.
- Staff auto-login authenticates the `staf@demo.local` account.
- Each account is assigned the appropriate role and permissions.
- This feature is disabled in the production environment.

---

## Installation and Configuration Steps

### 1. Navigate to the Project Directory

```bash
cd "D:\Documents\Coding\Pemrograman Berbasis Kerangka Kerja\PBKK-Tugas-10"
```

### 2. Install Composer Dependencies

```bash
composer install
```

### 3. Install npm Dependencies

```bash
npm install
```

### 4. Install Laravel Breeze

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
```

### 5. Install AdminLTE

```bash
composer require jeroennoten/laravel-adminlte
php artisan adminlte:install
```

### 6. Install Spatie Permission

```bash
composer require spatie/laravel-permission
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
```

### 7. Configure the `.env` File and Database

```bash
cp .env.example .env
php artisan key:generate
```

Configure the database settings in the `.env` file:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### 8. Run Migrations and Seed the Database

```bash
php artisan migrate:fresh --seed
```

### 9. Build Frontend Assets

```bash
npm run build
```

### 10. Start the Laravel Development Server

```bash
php artisan serve
```

### 11. Access the Application

- Open your browser and navigate to `http://127.0.0.1:8000`.
- Admin login: `admin@demo.local` / `password123`
- Staff login: `staf@demo.local` / `password123`

---

## Database and Seeder Information

### Tables Created by Spatie

- `permissions` – Stores permissions.
- `roles` – Stores roles (admin, staf).
- `model_has_roles` – Many-to-many relationship between users and roles.
- `model_has_permissions` – Many-to-many relationship between users and individual permissions.
- `role_has_permissions` – Many-to-many relationship between roles and permissions.

### Data Generated by the Seeder

- 50 dummy academic records generated using Faker.
- 1 Admin account (`admin@demo.local`, role: admin, all permissions).
- 1 Staff account (`staf@demo.local`, role: staf, view/create/edit permissions without delete access).

### Commands to Run the Seeder

```bash
php artisan db:seed --class=DatabaseSeeder

# Or run the following command to start from scratch:
php artisan migrate:fresh --seed
```

### Demo Account Credentials

- **Admin:** `admin@demo.local` – Password: `password123`, Role: admin.
- **Staff:** `staf@demo.local` – Password: `password123`, Role: staf.

**Note:** Passwords are not displayed in the public README. For local evaluation, access is available through the auto-login buttons on the login page or by navigating to the login URL and entering the credentials above.

---

## Role and Permission Matrix

| Permission | Admin | Staff |
|---|---|---|
| view dashboard | ✅ | ✅ |
| view data | ✅ | ✅ |
| create data | ✅ | ✅ |
| edit data | ✅ | ✅ |
| delete data | ✅ | ❌ |
| manage users | ✅ | ❌ |

**Explanation:**
- Admin has all 6 permissions listed above.
- Staff has only 4 permissions: view dashboard, view data, create data, and edit data.
- Delete functionality and user management are exclusively available to Admin.

---

## Project Structure

### Important Files and Directories

| Path | Description |
|---|---|
| `app/Models/AcademicData.php` | Model for academic records. |
| `app/Models/User.php` | User model with the Spatie `HasRoles` trait. |
| `app/Http/Controllers/AdminDashboardController.php` | Admin dashboard controller. |
| `app/Http/Controllers/AcademicDataController.php` | Academic data CRUD controller. |
| `database/seeders/DatabaseSeeder.php` | Main seeder (creates 50 records and demo accounts). |
| `database/seeders/RolePermissionSeeder.php` | Role and permission seeder. |
| `database/factories/AcademicDataFactory.php` | Faker factory for academic records. |
| `resources/views/layouts/admin.blade.php` | Master AdminLTE layout. |
| `resources/views/admin/dashboard.blade.php` | Dashboard view with statistics widgets. |
| `resources/views/admin/academic-data/index.blade.php` | Academic data listing view with search and pagination. |
| `resources/views/admin/academic-data/form.blade.php` | Create/edit form view. |
| `routes/web.php` | Application routes. |
| `config/permission.php` | Spatie Permission configuration. |
| `composer.json` | Laravel dependencies. |

---

## Testing Guide

### Authentication

1. **Admin Login:** Navigate to `http://127.0.0.1:8000/login` and enter `admin@demo.local` / `password123`.
2. **Staff Login:** Navigate to `http://127.0.0.1:8000/login` and enter `staf@demo.local` / `password123`.
3. **Logout:** Click the logout button in the top-right navigation bar.
4. **Dashboard Access Protection:** Users who are not logged in should be redirected to the login page when attempting to access protected dashboard pages.

### RBAC

1. **Admin Access:**
   - The Admin dashboard displays all 4 statistics widgets.
   - The "Add Data" and "Manage Users" buttons are visible.
   - Admin can create, edit, and delete academic records.

2. **Staff Access:**
   - The dashboard is accessible but displays only 3 main statistics widgets (without detailed role/permission statistics).
   - The "Manage Users" button is not visible.
   - The delete button is hidden through Blade authorization directives.
   - Staff can view, add, and edit records but **cannot delete them**.

3. **Role-Based Menu Visibility:**
   - The "User Management" menu is only visible to Admin.
   - Standard menus (Dashboard, Data) are visible to both roles.

4. **Admin-Only Delete Operations:**
   - Staff cannot see the delete button.
   - If Staff attempts to access the delete URL directly, the application returns HTTP 403 Forbidden.

5. **Direct URL Access Restrictions:**
   - Directly accessing the `/academic-data/{id}` delete endpoint as Staff must return HTTP 403 Forbidden.
   - The `permission:delete data` middleware prevents unauthorized access to the delete functionality.

### Dashboard

1. **At Least Three Dynamic Statistics Widgets:**
   - Total Users: `{{ User::count() }}`
   - Total Academic Records: `{{ AcademicData::count() }}`
   - Total Roles: `{{ Role::count() }}`
   - Total Permissions: `{{ Permission::count() }}`

2. **Data Accuracy:**
   - All widget values must match the actual number of records stored in the database.

### Search and Pagination

1. **Search Results:** Enter a keyword in the search form and verify that only matching records are displayed.
2. **Empty Search:** Clear the search field and verify that all records are displayed normally.
3. **Pagination:** Verify that page navigation works correctly.
4. **Search Parameter Persistence:** Verify that the search keyword remains in the URL when navigating between pages, for example `?search=keyword&page=2`.

### Seeder and Demo Login

1. **Faker Dummy Data:** Verify that Faker successfully generates exactly 50 academic records.
2. **Demo Accounts:** Verify that the Admin and Staff accounts are created correctly by checking the `users`, `roles`, and `permissions` tables.
3. **Auto-Login Buttons:**
   - Open `/auto-login/admin` to log in as Admin.
   - Open `/auto-login/staf` to log in as Staff.
   - These routes must only be accessible in the `local` or `testing` environments.