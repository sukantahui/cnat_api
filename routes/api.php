<?php

/**
 * =============================================================================
 * API Route Definitions — CNAT API
 * =============================================================================
 *
 * This file registers all API routes for the CNAT application.
 * Routes are organized into the following access tiers:
 *
 *  [Public]    No authentication required (login only)
 *  [Auth]      Requires a valid Sanctum token (any authenticated user)
 *  [Tier 1]    Admin, Developer, Owner
 *  [Tier 1.5]  Admin, Developer, Owner, Manager
 *  [Tier 2]    Admin, Developer, Owner, Manager, Teacher
 *  [Tier 3]    Admin, Developer, Owner, Manager, Teacher, Manager Sale
 *  [DEV]       No token — local development only (never expose in production)
 *
 * Authentication : Laravel Sanctum (Bearer token)
 * Role Guard     : 'role' middleware (Spatie Permission)
 * Base URL prefix: /api  (configured in bootstrap/app.php or RouteServiceProvider)
 *
 * Last updated: 2026-09-04
 * =============================================================================
 */

// ─────────────────────────────────────────────────────────────────────────────
// Controller Imports
// ─────────────────────────────────────────────────────────────────────────────
use App\Http\Controllers\AdmissionController;        // Student course admissions & ledger
use App\Http\Controllers\CourseController;            // Course CRUD + enrollment info
use App\Http\Controllers\DepartmentController;        // Department management
use App\Http\Controllers\EmployeeController;          // Staff/employee CRUD
use App\Http\Controllers\Api\AuthController;          // Auth: login, logout, user info, registration
use App\Http\Controllers\CertificateController;       // Certificate lookup by number
use App\Http\Controllers\QuestionController;          // Question bank (MCQ / etc.)
use App\Http\Controllers\OptionController;            // Answer options for questions
use App\Http\Controllers\ResultController;            // Exam results
use App\Http\Controllers\StateController;             // Indian states / geo reference data
use App\Http\Controllers\StudentController;           // Student CRUD + related queries
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;             // Guest / inquiry management (leads)
use App\Http\Controllers\VisitorController;           // Walk-in visitor log
use App\Http\Controllers\SubjectController;           // Academic subjects
use App\Http\Controllers\ChapterController;           // Chapters within subjects
use App\Http\Controllers\TopicController;             // Topics within chapters
use App\Http\Controllers\SimpleFeesReceiptController; // Fee payment receipts
use App\Http\Controllers\CycleCalendarController;    // Menstrual cycle health tracker (per-user)


// ─────────────────────────────────────────────────────────────────────────────
// PUBLIC ROUTES  (no authentication required)
// ─────────────────────────────────────────────────────────────────────────────

/**
 * POST /api/login  →  AuthController@login
 * Authenticate a user and return a Sanctum Bearer token.
 * Body: { email, password }
 * Response: { token, user }
 */
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
});


// ─────────────────────────────────────────────────────────────────────────────
// AUTHENTICATED ROUTES  (requires: auth:sanctum)
// All routes below require a valid Bearer token in the Authorization header.
// ─────────────────────────────────────────────────────────────────────────────
Route::group(['middleware' => 'auth:sanctum'], function () {

    // =========================================================================
    // [Auth]  Self-Service — available to ALL authenticated users
    // =========================================================================

    Route::controller(AuthController::class)->group(function () {
        /** GET  /api/me         → getCurrentUser()  Authenticated user's profile + roles */
        Route::get('me', 'getCurrentUser');

        /** GET  /api/me2        → getCurrentUser2() Alternative / extended user info */
        Route::get('me2', 'getCurrentUser2');

        /** POST /api/logout     → logout()          Revoke current access token */
        Route::post('logout', 'logout');

        /** GET  /api/revokeAll  → revoke_all()      Revoke ALL tokens (sign out everywhere) */
        Route::get('revokeAll', 'revoke_all');
    });

    // =========================================================================
    // [Auth]  Menstrual Cycle Calendar — Personal Health Tracker
    // Scoped per authenticated user (user_id from token); no role restriction.
    // Base prefix: /api/cycle
    // =========================================================================
    Route::prefix('cycle')->controller(CycleCalendarController::class)->group(function () {
        /** GET    /api/cycle/me              → me()              Load or auto-create the user's health profile */
        Route::get('me',               'me');

        /** PUT    /api/cycle/me              → updateProfile()   Update health profile + notification settings */
        Route::put('me',               'updateProfile');

        /** POST   /api/cycle/period          → addPeriodDate()   Add one period start date */
        Route::post('period',          'addPeriodDate');

        /** PUT    /api/cycle/period/{date}   → editPeriodDate()  Edit an existing period start date */
        Route::put('period/{date}',    'editPeriodDate');

        /** DELETE /api/cycle/period/{date}   → deletePeriodDate() Remove one period start date */
        Route::delete('period/{date}', 'deletePeriodDate');

        /** POST   /api/cycle/periods/sync    → syncPeriodDates() Bulk-replace all period dates */
        Route::post('periods/sync',    'syncPeriodDates');

        /** DELETE /api/cycle/periods         → clearAllPeriods() Wipe all period dates for the user */
        Route::delete('periods',       'clearAllPeriods');
    });


    // =========================================================================
    // TIER 1 — Administration & System
    // Roles: Admin | Developer | Owner
    // Platform-level config: users, roles, departments, employees.
    // =========================================================================
    Route::middleware('role:Admin,Developer,Owner')->group(function () {

        // ── User Management ───────────────────────────────────────────────────
        // Base prefix: /api/users
        Route::controller(AuthController::class)->prefix('users')->group(function () {
            /** GET  /api/users  → index()    List all registered users */
            Route::get('/', 'index');

            /** POST /api/users  → register() Register a new user account */
            Route::post('/', 'register');
        });

        /**
         * GET /api/user-types  →  UserTypeController@index
         * All available user roles/types (for dropdowns / role assignment UI).
         */
        Route::get('user-types', [App\Http\Controllers\UserTypeController::class, 'index']);

        // ── Department Management ─────────────────────────────────────────────
        Route::controller(DepartmentController::class)->group(function () {
            /** GET  /api/departments  → index()  List all departments */
            Route::get('departments', 'index');

            /** POST /api/departments  → store()  Create a new department */
            Route::post('departments', 'store');

            /** PUT  /api/departments  → update() Update department details */
            Route::put('departments', 'update');
        });

        // ── Employee Management ───────────────────────────────────────────────
        // Base prefix: /api/employees
        Route::controller(EmployeeController::class)->prefix('employees')->group(function () {
            /** GET    /api/employees          → index()   List all employees */
            Route::get('/', 'index');

            /** GET    /api/employees/{id}     → show()    Fetch one employee by ID */
            Route::get('/{id}', 'show');

            /** POST   /api/employees          → store()   Create a new employee record */
            Route::post('/', 'store');

            /** PUT    /api/employees/{id}     → update()  Update employee details */
            Route::put('/{employeeId}', 'update');

            /** DELETE /api/employees/{id}     → destroy() Remove an employee record */
            Route::delete('/{employeeId}', 'destroy');
        });

    }); // end Tier 1


    // =========================================================================
    // TIER 1.5 — Academic & Admissions Management
    // Roles: Admin | Developer | Owner | Manager
    // Combined student-registration + admission workflow.
    // =========================================================================
    Route::middleware('role:Admin,Developer,Owner,Manager')->group(function () {

        // ── Combined Student + Admission Registration ─────────────────────────
        Route::controller(AdmissionController::class)->prefix('admissions')->group(function () {
            /**
             * POST /api/admissions/admissionWithStudent  →  storeStudentWithAdmission()
             * Creates a Student record AND an Admission record in one transaction.
             * Also sets the initial course fees for the admission.
             * Body: { student: {...}, admission: {...}, fees: {...} }
             */
            Route::post('/admissionWithStudent', 'storeStudentWithAdmission');
        });

    }); // end Tier 1.5


    // =========================================================================
    // TIER 2 — Academic Staff
    // Roles: Admin | Developer | Owner | Manager | Teacher
    // Full academic resource access: students, courses, curriculum hierarchy,
    // question bank, results, fee receipts, and reference data.
    // =========================================================================
    Route::middleware('role:Admin,Developer,Owner,Manager,Teacher')->group(function () {

        // ── Fee Modes (Reference) ─────────────────────────────────────────────
        /**
         * GET /api/fee-modes  →  FeeModeController@index
         * Returns available payment modes (e.g. Cash, Online, Cheque).
         */
        Route::get('fee-modes', [App\Http\Controllers\FeeModeController::class, 'index']);

        // ── Students ──────────────────────────────────────────────────────────
        // Standard CRUD via apiResource + custom nested/utility routes.
        // Base prefix: /api/students
        Route::controller(StudentController::class)->prefix('students')->group(function () {
            /** POST /api/students/basic                → storeBasic()              Register a student with minimal info */
            Route::post('/basic', 'storeBasic');

            /** GET  /api/students/{student}/admissions → admissions()              All admissions for a student */
            Route::get('/{student}/admissions', 'admissions');

            /** GET  /api/students/without-admission    → studentsWithoutAdmission() Students not yet enrolled in any course */
            Route::get('/without-admission', 'studentsWithoutAdmission');
        });
        // Standard REST: GET/POST/PUT/PATCH/DELETE /api/students{/{student}}
        Route::apiResource('students', StudentController::class);

        // ── Admissions ────────────────────────────────────────────────────────
        /**
         * GET /api/admissions/{admissionId}/ledger  →  AdmissionController@ledger
         * Full fee payment ledger: all payments made + outstanding balance.
         */
        Route::get('admissions/{admissionId}/ledger', [AdmissionController::class, 'ledger']);
        // Standard REST: GET/POST/PUT/PATCH/DELETE /api/admissions{/{admission}}
        Route::apiResource('admissions', AdmissionController::class);

        // ── Courses ───────────────────────────────────────────────────────────
        // Base prefix: /api/courses
        Route::controller(CourseController::class)->prefix('courses')->group(function () {
            /** GET    /api/courses                  → index()           List all courses */
            Route::get('/', 'index');

            /** GET    /api/courses/details          → courseWithDetails() Courses with subjects, fees, etc. */
            Route::get('/details', 'courseWithDetails');

            /** POST   /api/courses                  → store()           Create a full course record */
            Route::post('/', 'store');

            /** POST   /api/courses/basic            → storeBasic()      Create a course with minimal info */
            Route::post('/basic', 'storeBasic');

            /** PUT    /api/courses/{courseId}       → update()          Update course details */
            Route::put('/{courseId}', 'update');

            /** DELETE /api/courses/{courseId}       → destroy()         Delete a course */
            Route::delete('/{courseId}', 'destroy');

            /** GET    /api/courses/{course}/students → students()       Students enrolled in this course */
            Route::get('/{course}/students', 'students');
        });

        // ── Curriculum Hierarchy: Subject → Chapter → Topic ──────────────────

        // Subjects  (base: /api/subjects)
        Route::controller(SubjectController::class)->prefix('subjects')->group(function () {
            /** GET /api/subjects/unused                 → unused_subjects()               Subjects not linked to any course */
            Route::get('/unused', 'unused_subjects');

            /** GET /api/subjects/{subject}/chapters     → list_of_chapters_in_subjects()  Chapters in a subject */
            Route::get('/{subject}/chapters', 'list_of_chapters_in_subjects');
        });
        // Standard REST: GET/POST/PUT/PATCH/DELETE /api/subjects{/{subject}}
        Route::apiResource('subjects', SubjectController::class);

        // Chapters  (base: /api/chapters)
        Route::controller(ChapterController::class)->prefix('chapters')->group(function () {
            /** GET /api/chapters/unusedChapters         → unused_chapters()               Chapters not assigned to any subject */
            Route::get('/unusedChapters', 'unused_chapters');

            /** GET /api/chapters/{chapter}/topics       → list_of_topics_in_chapters()   Topics in a chapter */
            Route::get('/{chapter}/topics', 'list_of_topics_in_chapters');
        });
        // Standard REST: GET/POST/PUT/PATCH/DELETE /api/chapters{/{chapter}}
        Route::apiResource('chapters', ChapterController::class);

        // Topics  (base: /api/topics)
        Route::prefix('topics')->controller(TopicController::class)->group(function () {
            /** GET /api/topics/unusedTopics             → unused_topics()                 Topics not linked to any chapter */
            Route::get('/unusedTopics', 'unused_topics');

            /** GET /api/topics/{topic}/questions        → list_of_questions_in_topics()  Questions under a topic */
            Route::get('/{topic}/questions', 'list_of_questions_in_topics');
        });
        // Standard REST: GET/POST/PUT/PATCH/DELETE /api/topics{/{topic}}
        Route::apiResource('topics', TopicController::class);

        // ── Question Bank ─────────────────────────────────────────────────────
        // Standard REST: GET/POST/PUT/PATCH/DELETE /api/questions{/{question}}
        Route::apiResource('questions', QuestionController::class);

        // Answer Options for Questions  (base: /api/options)
        Route::controller(OptionController::class)->prefix('options')->group(function () {
            /** GET    /api/options           → index()   List all answer options */
            Route::get('/', 'index');

            /** GET    /api/options/{id}      → show()    Fetch one option by ID */
            Route::get('/{optionId}', 'show');

            /** POST   /api/options           → store()   Create an answer option */
            Route::post('/', 'store');

            /** PUT    /api/options/{option}  → update()  Update an answer option */
            Route::put('/{option}', 'update');

            /** DELETE /api/options/{option}  → destroy() Remove an answer option */
            Route::delete('/{option}', 'destroy');
        });

        // ── Results ───────────────────────────────────────────────────────────
        // Standard REST: GET/POST/PUT/PATCH/DELETE /api/results{/{result}}
        Route::apiResource('results', ResultController::class);

        // ── Fee Receipts ──────────────────────────────────────────────────────
        // Standard REST: GET/POST/PUT/PATCH/DELETE /api/fees-receipts{/{feesReceipt}}
        Route::apiResource('fees-receipts', SimpleFeesReceiptController::class);

        // ── States (Reference / Geo Data) ─────────────────────────────────────
        // Used for address fields across students, employees, guests, etc.
        // Base prefix: /api/states
        Route::controller(StateController::class)->prefix('states')->group(function () {
            /** GET    /api/states       → index()   List all states */
            Route::get('/', 'index');

            /** GET    /api/states/{id}  → show()    Get a single state */
            Route::get('/{stateId}', 'show');

            /** POST   /api/states       → store()   Add a new state entry */
            Route::post('/', 'store');

            /** PUT    /api/states/{id}  → update()  Update a state */
            Route::put('/{stateId}', 'update');

            /** DELETE /api/states/{id}  → destroy() Remove a state */
            Route::delete('/{stateId}', 'destroy');
        });

    }); // end Tier 2


    // =========================================================================
    // TIER 3 — Events & Inquiries
    // Roles: Admin | Developer | Owner | Manager | Teacher | Manager Sale
    // Manages walk-in guest inquiries (leads) and daily visitor logs.
    // =========================================================================
    Route::middleware('role:Admin,Developer,Owner,Manager,Teacher,Manager Sale')->group(function () {

        // ── Guests (Inquiries / Leads) ────────────────────────────────────────
        // Base prefix: /api/guests
        Route::controller(GuestController::class)->prefix('guests')->group(function () {
            /** GET    /api/guests               → index()           Full guest list */
            Route::get('/', 'index');

            /** GET    /api/guests/pagination    → index_pagination() Paginated guest list */
            Route::get('/pagination', 'index_pagination');

            /** GET    /api/guests/{guest}       → show()            Single guest record */
            Route::get('/{guest}', 'show');

            /** GET    /api/guests/search/any   → search()           Search by name / phone / email */
            Route::get('/search/any', 'search');

            /** POST   /api/guests               → store()           Create a new inquiry/lead */
            Route::post('/', 'store');

            /** PUT    /api/guests/{guest}       → update()          Update guest details */
            Route::put('/{guest}', 'update');

            /** DELETE /api/guests/{guest}       → destroy()         Remove a guest record */
            Route::delete('/{guest}', 'destroy');
        });

        // ── Visitors (Walk-in Log) ────────────────────────────────────────────
        // Tracks daily walk-ins. POST is throttled (3 req/min) to prevent duplicates.
        // Base prefix: /api/visitors
        Route::controller(VisitorController::class)->prefix('visitors')->group(function () {
            /** GET    /api/visitors          → index()   All visitor log entries */
            Route::get('/', 'index');

            /** POST   /api/visitors          → store()   Log a new walk-in (throttle: 3/min) */
            Route::post('/', 'store')->middleware('throttle:3,1');

            /** PUT    /api/visitors/{id}     → update()  Correct a visitor entry */
            Route::put('/{visitorId}', 'update');

            /** DELETE /api/visitors/{id}     → destroy() Remove a visitor entry */
            Route::delete('/{visitorId}', 'destroy');
        });

    }); // end Tier 3

}); // end auth:sanctum


// =============================================================================
// DEV-ONLY ROUTES  ⚠️  NO AUTHENTICATION REQUIRED
// =============================================================================
// WARNING: These routes bypass ALL authentication and role checks.
//          They exist ONLY for rapid local development and endpoint testing.
//          NEVER expose these in staging or production.
//          Consider removing or guarding with: if (app()->environment('local'))
//
// Base prefix: /api/dev
// =============================================================================
Route::group(['prefix' => 'dev'], function () {

    // Guests — open CRUD for dev/testing
    Route::controller(GuestController::class)->prefix('guests')->group(function () {
        Route::get('/', 'index');
        Route::get('/{guest}', 'show');
        Route::post('/', 'store');
        Route::put('/{guest}', 'update');
        Route::delete('/{guest}', 'destroy');
    });

    // Students — open CRUD for dev/testing
    Route::controller(StudentController::class)->prefix('students')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{studentId}', 'update');
        Route::delete('/{studentId}', 'destroy');
    });

    // Admissions — open CRUD for dev/testing
    Route::controller(AdmissionController::class)->prefix('admissions')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{admissionId}', 'update');
        Route::delete('/{admissionId}', 'destroy');
    });

    // Certificate Lookup — fetch by certificate number (public lookup, dev only)
    Route::controller(CertificateController::class)->prefix('certificates')->group(function () {
        /** GET /api/dev/certificates/{certificate_number}  →  index()  Fetch certificate details */
        Route::get('/{certificate_number}', 'index');
    });

    // Visitors — open POST for dev/testing (throttle still applied)
    Route::controller(VisitorController::class)->prefix('visitors')->group(function () {
        Route::post('/', 'store')->middleware('throttle:3,1');
    });
});




