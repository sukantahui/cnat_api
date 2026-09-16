# 🚀 CNAT API — Master Project Audit & Step-by-Step Rectification Plan

> **Target:** Transform CNAT API into an Enterprise-Grade, Highly Secured & Professional Laravel Application  
> **Framework:** Laravel 12.x • **PHP:** 8.2+ • **Database:** MySQL  
> **Interactive Version:** Open [`PROJECT_AUDIT_AND_RECTIFICATION_PLAN.html`](file:///e:/cnat_api/PROJECT_AUDIT_AND_RECTIFICATION_PLAN.html) in your browser for a live interactive progress tracker.

---

## 📊 Executive Progress Dashboard

| Phase | Category | Priority | Tasks | Status |
| :---: | :--- | :---: | :---: | :---: |
| **Phase 1** | 🔐 Security & Authentication Hardening | **P0 (Critical)** | 5 Tasks | ⏳ Ready |
| **Phase 2** | 🏛️ Architecture & Code Cleanliness | **P1 (High)** | 4 Tasks | ⏳ Ready |
| **Phase 3** | ⚡ Database Integrity & Performance | **P1 (High)** | 4 Tasks | ⏳ Ready |
| **Phase 4** | 🧪 Automated Testing Suite (Pest) | **P2 (Medium)** | 4 Tasks | ⏳ Ready |
| **Phase 5** | 🚀 Production Readiness & Automation | **P2 (Medium)** | 3 Tasks | ⏳ Ready |

---

## 🔐 Phase 1: Security & Authentication Hardening (P0 — Critical)

### [ ] Task 1.1 — Configure Token Expiration in Sanctum
* **File:** [`config/sanctum.php:49`](file:///e:/cnat_api/config/sanctum.php#L49)
* **Problem:** `'expiration' => null` means API tokens remain valid forever unless manually logged out. If a user's token is leaked, it can never be invalidated by time.
* **Rectification:**
  Set a default expiration time (e.g., 30 days) and make it configurable via `.env`:
  ```php
  // config/sanctum.php
  'expiration' => env('SANCTUM_EXPIRATION_MINUTES', 60 * 24 * 30), // 30 days
  ```
* **Add to `.env.example`:**
  ```env
  SANCTUM_EXPIRATION_MINUTES=43200
  ```

---

### [ ] Task 1.2 — Dynamic CORS Configuration
* **File:** [`config/cors.php:9-12`](file:///e:/cnat_api/config/cors.php#L9-L12)
* **Problem:** Allowed origins are hardcoded to `http://localhost:5173`. When deployed to staging or production, the frontend will be blocked by CORS unless modified.
* **Rectification:**
  Allow comma-separated origins from `.env`:
  ```php
  // config/cors.php
  'allowed_origins' => explode(',', env('CORS_ALLOWED_ORIGINS', 'http://localhost:5173,http://127.0.0.1:5173,http://localhost:3000')),
  ```
* **Add to `.env.example`:**
  ```env
  CORS_ALLOWED_ORIGINS="http://localhost:5173,http://127.0.0.1:5173"
  ```

---

### [ ] Task 1.3 — Add Rate Limiting to Sensitive Submission Endpoints
* **File:** [`routes/api.php`](file:///e:/cnat_api/routes/api.php)
* **Problem:** Endpoints like creating new admissions (`POST /api/admissions/admissionWithStudent`), registering users (`POST /api/users`), and generating database backups (`POST /api/backups`) lack throttling.
* **Rectification:**
  Apply appropriate rate limits:
  ```php
  // In routes/api.php
  Route::post('admissionWithStudent', 'storeStudentWithAdmission')->middleware('throttle:10,1');
  Route::post('/', 'register')->middleware('throttle:10,1');
  Route::post('/', 'create')->middleware('throttle:3,1'); // Backups
  ```

---

### [ ] Task 1.4 — Model Attribute Exposure & Mass Assignment Protection
* **Files:** [`app/Models/User.php`](file:///e:/cnat_api/app/Models/User.php), [`app/Models/Employee.php`](file:///e:/cnat_api/app/Models/Employee.php), [`app/Models/Student.php`](file:///e:/cnat_api/app/Models/Student.php)
* **Problem:** Ensure that sensitive internal columns like `password`, `remember_token` are always hidden in JSON serialization, and `$fillable` is strictly defined on all models.
* **Checklist:**
  - Verify `$hidden = ['password', 'remember_token']` is present in `User.php`.
  - Ensure models do not use unconstrained `$guarded = []`.

---

### [ ] Task 1.5 — Unified JSON Exception Handling in `bootstrap/app.php`
* **File:** [`bootstrap/app.php:29-48`](file:///e:/cnat_api/bootstrap/app.php#L29-L48)
* **Problem:** Currently only `NotFoundHttpException` is caught. Authentication failures or method not allowed errors may return HTML or unformatted JSON.
* **Rectification:**
  Add handlers for `AuthenticationException`, `AuthorizationException`, and `MethodNotAllowedHttpException` in `bootstrap/app.php`:
  ```php
  ->withExceptions(function (Exceptions $exceptions) {
      // 401 Unauthenticated
      $exceptions->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
          if ($request->is('api/*')) {
              return response()->json([
                  'status'  => false,
                  'message' => 'Unauthenticated. Please provide a valid Bearer token.',
                  'data'    => null,
              ], 401);
          }
      });

      // 404 Not Found
      $exceptions->renderable(function (NotFoundHttpException $e, $request) {
          if ($request->is('api/*')) {
              return response()->json([
                  'status'  => false,
                  'message' => 'Requested resource or endpoint was not found.',
                  'data'    => null,
              ], 404);
          }
      });
  })
  ```

---

## 🏛️ Phase 2: Architecture & Code Cleanliness (P1 — High)

### [ ] Task 2.1 — Clean up 28 Dead Policy Classes
* **Directory:** [`app/Policies/`](file:///e:/cnat_api/app/Policies)
* **Problem:** All 28 policy classes (e.g. [`AdmissionPolicy.php`](file:///e:/cnat_api/app/Policies/AdmissionPolicy.php), [`StudentPolicy.php`](file:///e:/cnat_api/app/Policies/StudentPolicy.php)) contain stubbed `return false;` in every method, which can accidentally block requests if Laravel policy discovery triggers.
* **Rectification Options:**
  - **Option A (Recommended):** If you rely entirely on `CheckRole` middleware in routes, delete the unused `app/Policies` directory.
  - **Option B:** Implement actual role authorization inside each policy method:
    ```php
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Admin', 'Developer', 'Owner', 'Manager', 'Teacher');
    }
    ```

---

### [ ] Task 2.2 — Consolidate Response Helpers
* **Files:** [`app/Helper/ResponseHelper.php`](file:///e:/cnat_api/app/Helper/ResponseHelper.php) & [`app/Traits/ApiResponse.php`](file:///e:/cnat_api/app/Traits/ApiResponse.php)
* **Problem:** You have both a static `ResponseHelper` class and an `ApiResponse` trait doing almost identical formatting.
* **Rectification:**
  Consolidate all response formatting through [`ResponseHelper.php`](file:///e:/cnat_api/app/Helper/ResponseHelper.php) so there is a single source of truth across the codebase.

---

### [ ] Task 2.3 — Clean up Stray Backup Files & Update `.gitignore`
* **Problem:** Files like `routes/api.php.bak` and `database/seeders/CourseWithDetailsSeeder.php.bak` clutter the repository and risk being committed to version control.
* **Rectification:**
  1. Delete `routes/api.php.bak` and `database/seeders/CourseWithDetailsSeeder.php.bak`.
  2. Add backup extensions to `.gitignore`:
     ```gitignore
     *.bak
     *.backup
     *.hui
     ```

---

### [ ] Task 2.4 — Clean up Duplicate Docblocks in `AuthController.php`
* **File:** [`app/Http/Controllers/Api/AuthController.php:19-22`](file:///e:/cnat_api/app/Http/Controllers/Api/AuthController.php#L19-L22)
* **Problem:** Duplicate `/**` comment openers on line 19-20.
* **Rectification:** Remove the duplicated line.

---

## ⚡ Phase 3: Database Integrity & Query Performance (P1 — High)

### [ ] Task 3.1 — Fix Migration Filename Typo
* **File:** `database/migrations/025_08_25_195823_create_food_preferences_table.php`
* **Problem:** The year prefix has a typo (`025_` instead of `2025_`).
* **Rectification:** Rename to `2025_08_25_195823_create_food_preferences_table.php`.

---

### [ ] Task 3.2 — Add Database Indexes for Fast Searching
* **Files:** `database/migrations/`
* **Problem:** Search and filtering endpoints query columns that currently lack database indexes:
  - `students.registration_number`
  - `students.phone1` / `whatsapp`
  - `admissions.admission_number`
  - `simple_fees_receipts.receipt_no`
  - `certificates.certificate_number`
  - `guests.token` / `mobile`
* **Rectification:** Create a new migration `add_performance_indexes_to_tables.php`:
  ```php
  Schema::table('students', function (Blueprint $table) {
      $table->index('registration_number');
      $table->index('phone1');
      $table->index('whatsapp');
  });
  Schema::table('admissions', function (Blueprint $table) {
      $table->index('admission_number');
  });
  Schema::table('simple_fees_receipts', function (Blueprint $table) {
      $table->index('receipt_no');
  });
  Schema::table('certificates', function (Blueprint $table) {
      $table->index('certificate_number');
  });
  ```

---

### [ ] Task 3.3 — Review Foreign Key Cascade Rules
* **Files:** `database/migrations/`
* **Checklist:**
  - Verify that deleting a student or employee sets `users.student_id` or `users.employee_id` to `NULL` (`nullOnDelete()`) instead of breaking foreign key constraints.
  - Verify `course_details` cascade deletes on `courses` deletion (`cascadeOnDelete()`).

---

### [ ] Task 3.4 — Prevent N+1 Queries in Heavy Endpoints
* **Files:** [`AdmissionController.php`](file:///e:/cnat_api/app/Http/Controllers/AdmissionController.php), [`GuestController.php`](file:///e:/cnat_api/app/Http/Controllers/GuestController.php), [`CourseController.php`](file:///e:/cnat_api/app/Http/Controllers/CourseController.php)
* **Checklist:**
  - Verify all collection queries use `with([...])` eager loading for related models (gender, foodPreference, course, department, designation).

---

## 🧪 Phase 4: Automated Testing Suite (P2 — Medium)

### [ ] Task 4.1 — Initialize Tests Directory & Pest Framework
* **Problem:** The `tests/` directory is missing even though `pestphp/pest` is in `composer.json`.
* **Rectification:**
  Create directory structure:
  ```
  tests/
  ├── Feature/
  │   ├── AuthTest.php
  │   ├── AdmissionTest.php
  │   └── GuestTest.php
  ├── Unit/
  ├── TestCase.php
  └── Pest.php
  ```

---

### [ ] Task 4.2 — Write Feature Test for Authentication & Role Access
* **File:** `tests/Feature/AuthTest.php`
* **Test Cases:**
  1. `test_user_can_login_with_valid_credentials()`
  2. `test_user_cannot_login_with_invalid_credentials()`
  3. `test_login_is_rate_limited_after_6_attempts()`
  4. `test_authenticated_user_can_access_profile()`
  5. `test_non_admin_cannot_access_user_management()` (Verifies `CheckRole` returns 403)
  6. `test_user_can_logout_and_revoke_token()`

---

### [ ] Task 4.3 — Add Test Command in `composer.json`
* **File:** [`composer.json:41-61`](file:///e:/cnat_api/composer.json#L41-L61)
* **Rectification:**
  ```json
  "scripts": {
      "test": "pest --colors=always",
      "test:coverage": "pest --coverage"
  }
  ```

---

## 🚀 Phase 5: Production Readiness & Automation (P2 — Medium)

### [ ] Task 5.1 — Schedule Automated Daily Database Backups
* **File:** [`routes/console.php`](file:///e:/cnat_api/routes/console.php)
* **Problem:** The `php artisan db:backup` command exists, but is not scheduled to run automatically.
* **Rectification:**
  Add daily schedule in `routes/console.php`:
  ```php
  use Illuminate\Support\Facades\Schedule;

  Schedule::command('db:backup')
      ->dailyAt('02:00')
      ->appendOutputTo(storage_path('logs/backup.log'));
  ```

---

### [ ] Task 5.2 — Route, Config & Event Caching Commands
* **Documentation Checklist:**
  Before deploying to production, run:
  ```bash
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  ```

---

### [ ] Task 5.3 — Logging & Audit Retention
* **File:** `config/logging.php`
* **Checklist:**
  - Verify that daily log channels keep at least 14 days of logs (`'days' => 14`).
  - Ensure sensitive credentials (e.g. passwords, bearer tokens) are filtered from log outputs.

---

## 📋 Recommended Execution Order

```
[Phase 1: Security Hardening] ➔ [Phase 2: Code Architecture] ➔ [Phase 3: Database Optimization] ➔ [Phase 4: Automated Tests] ➔ [Phase 5: Production Deployment]
```
