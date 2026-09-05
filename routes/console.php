<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('db:backup', function () {
    $this->info('Starting database backup...');
    $controller = new \App\Http\Controllers\BackupController();
    $response = $controller->create();
    $data = json_decode($response->getContent(), true);

    if ($response->getStatusCode() === 201 && ($data['status'] ?? false)) {
        $this->info('✓ ' . $data['message']);
        $this->line('  File: ' . $data['data']['filename']);
        $this->line('  Size: ' . $data['data']['size_human']);
        $this->line('  Created At: ' . $data['data']['created_at']);
        return 0;
    }

    $this->error('✗ ' . ($data['message'] ?? 'Database backup failed.'));
    if (!empty($data['data']['mysqldump_error'])) {
        $this->error('  Error: ' . $data['data']['mysqldump_error']);
    }
    return 1;
})->purpose('Create a new MySQL database backup (.sql)');
