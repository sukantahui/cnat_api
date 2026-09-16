@echo off
setlocal

echo ===================================================
echo   CNAT API - Database Restore
echo ===================================================

REM If an optional SQL backup path is passed as argument:
REM Example: dbrestore.bat "C:\Users\USER\Downloads\my_backup.sql"
if not "%~1"=="" (
    php artisan db:restore "%~1"
) else (
    php artisan db:restore
)

if %errorlevel% neq 0 (
    echo.
    echo [ERROR] Database restore failed with exit code %errorlevel%.
) else (
    echo.
    echo [OK] Database restore completed successfully!
)

echo.
pause
