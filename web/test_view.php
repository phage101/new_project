<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = \App\Models\User::withTrashed()->get();
$html = view('users.index', compact('users'))->render();
file_put_contents('test_view_output.html', $html);
echo "Rendered successfully. Size: " . strlen($html);
