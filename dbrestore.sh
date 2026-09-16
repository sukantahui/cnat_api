#!/bin/bash

# Database restore helper script
if [ -n "$1" ]; then
    php artisan db:restore "$1"
else
    php artisan db:restore
fi
