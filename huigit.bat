@echo off
setlocal enabledelayedexpansion

REM Require commit message
if "%~1"=="" (
    echo ❌ Please provide a commit message.
    echo Usage: huigit "your message"
    exit /b 1
)

set MSG=%~1

REM Check if there are changes
git diff --quiet
if %errorlevel%==0 (
    git diff --cached --quiet
    if %errorlevel%==0 (
        echo ⚠️ Nothing to commit.
        exit /b 0
    )
)

echo 📦 Adding files...
git add .

echo 📝 Committing...
git commit -m "%MSG%"
if %errorlevel% neq 0 exit /b 1

echo ⬇️ Pulling latest (rebase)...
git pull --rebase
if %errorlevel% neq 0 exit /b 1

echo ⬆️ Pushing...
git push
if %errorlevel% neq 0 exit /b 1

echo ✅ Done!
