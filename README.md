# Motorcycle Group Company & Management System

A Laravel 12 web application featuring a public motorcycle showroom, customer inquiry system, and an administrative dashboard with role-based access control and brand-scoped permissions.

---

## 🚀 Setup & Installation

Follow these steps to run the project locally:

```bash
# 1. Install dependencies
composer install
npm install

# 2. Setup environment file
cp .env.example .env
# Windows PowerShell: Copy-Item .env.example .env

# 3. Generate app key
php artisan key:generate

# 4. Link storage (for uploaded images)
php artisan storage:link

# 5. Run migrations & seed data
php artisan migrate --seed

# 6. Start the development servers
php artisan serve
npm run dev
```

* **Website**: `https://motorcycles.amirahagag.com`
* **Dashboard**: `https://motorcycles.amirahagag.com/dashboard`
* **Login**: `https://motorcycles.amirahagag.com/login`

---

## 👥 Seeded Accounts & Default Credentials

Running `php artisan db:seed` (or `migrate --seed`) creates two default accounts:

| Role | Email | Password | Scope / Brand Access |
| :--- | :--- | :--- | :--- |
| **Admin** | `admin@moto.test` | `password` | Global access (all brands & system features) |
| **Data Entry** | `entry@moto.test` | `password` | Assigned to spasific brands |

---

## 🛡️ Roles & Permissions (Brand Assignment)

The system supports two distinct roles defined in `App\Enums\Role`:

### 1. Administrator (`admin`)
* **Full System Access**: Has unrestricted access to all dashboard areas.
* **User Management**: Can create, edit, activate/deactivate users, and assign brands to Data Entry staff.
* **Catalog Management**: Full CRUD on Categories, Services, Brands, Motorcycles, and Sliders.
* **Inquiries**: Can view and delete all customer inquiries.

### 2. Data Entry (`data-entry`)
* **Brand Assignment Scoping**: Access is strictly limited to the **brands assigned to the user** by an Admin.
* **Motorcycles**: Can only view, create, edit, and delete motorcycles belonging to their **assigned brands**.
* **Inquiries**: Can only view and delete inquiries for motorcycles from their **assigned brands**.
* **Brands**: Can view and update their assigned brands, but **cannot** create new brands or delete existing ones.
* **Restrictions**: **No access** to Users, Categories, or Services (returns HTTP 403 Forbidden).

---

## 🔒 Account Status (`is_active`)

* Admins can activate or deactivate user accounts from the User Management screen.
* Any user whose account is set to inactive will be automatically logged out by the system middleware on their next request and denied login access.
