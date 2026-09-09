<?php

use Illuminate\Support\Facades\File;

test('export:post-process converts storage asset URLs and copies uploaded files to docs/storage', function () {
    $docsDir = base_path('docs');
    $indexPath = base_path('docs/index.html');
    $storageTarget = base_path('docs/storage');
    $dummyStorageAppPublic = storage_path('app/public/test_export');

    File::ensureDirectoryExists($docsDir);
    File::ensureDirectoryExists($dummyStorageAppPublic);
    File::put($dummyStorageAppPublic.'/sample.txt', 'exported asset');

    $originalIndex = File::exists($indexPath) ? File::get($indexPath) : null;

    $mockHtml = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <script id="browser-logger-active">console.log('logger')</script>
    <link rel="icon" href="/favicon.svg">
    <link rel="stylesheet" href="/build/assets/app.css">
</head>
<body>
    <img src="http://portfolio.test/storage/projects/demo.jpg">
    <img src="/storage/hero/avatar.png">
    <img src="/images/profile.jpg">
</body>
</html>
HTML;

    File::put($indexPath, $mockHtml);

    $this->artisan('export:post-process')
        ->assertSuccessful();

    $processed = File::get($indexPath);

    expect($processed)->not->toContain('<script id="browser-logger-active">')
        ->and($processed)->toContain('src="./storage/projects/demo.jpg"')
        ->and($processed)->toContain('src="./storage/hero/avatar.png"')
        ->and($processed)->toContain('src="./images/profile.jpg"')
        ->and($processed)->toContain('href="./favicon.svg"')
        ->and($processed)->toContain('href="./build/assets/app.css"')
        ->and(File::exists($storageTarget.'/test_export/sample.txt'))->toBeTrue()
        ->and(File::exists($storageTarget.'/.gitignore'))->toBeFalse();

    // Clean up test artifacts
    File::deleteDirectory($dummyStorageAppPublic);
    if (File::exists($storageTarget.'/test_export')) {
        File::deleteDirectory($storageTarget.'/test_export');
    }
    if ($originalIndex !== null) {
        File::put($indexPath, $originalIndex);
    }
});

test('export:post-process returns failure when docs/index.html does not exist', function () {
    $indexPath = base_path('docs/index.html');
    $backupPath = base_path('docs/index.html.bak');

    if (File::exists($indexPath)) {
        File::move($indexPath, $backupPath);
    }

    try {
        $this->artisan('export:post-process')
            ->assertFailed();
    } finally {
        if (File::exists($backupPath)) {
            File::move($backupPath, $indexPath);
        }
    }
});
