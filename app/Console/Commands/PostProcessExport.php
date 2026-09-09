<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

#[Signature('export:post-process')]
#[Description('Post-process static HTML export to use relative paths for GitHub Pages')]
class PostProcessExport extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $indexPath = base_path('docs/index.html');

        if (! File::exists($indexPath)) {
            $this->error('docs/index.html not found!');

            return self::FAILURE;
        }

        $content = File::get($indexPath);

        // 1. Remove Laravel Boost browser logger script if present
        $content = preg_replace('/<script id="browser-logger-active">.*?<\/script>/s', '', $content);

        // 2. Convert absolute local host URLs (http://portfolio.test/ or http://localhost/ or configured APP_URL) to relative paths
        $appUrl = rtrim((string) config('app.url'), '/');
        if (! empty($appUrl)) {
            $content = str_replace($appUrl.'/', './', $content);
        }
        $content = preg_replace('#https?://portfolio\.test/#', './', $content);
        $content = preg_replace('#https?://localhost(:[0-9]+)?/#', './', $content);

        // 3. Convert root-relative paths like href="/build/" or src="/images/" or /storage/ to relative paths
        $content = str_replace('href="/build/', 'href="./build/', $content);
        $content = str_replace('src="/build/', 'src="./build/', $content);
        $content = str_replace('href="/resume.pdf"', 'href="./resume.pdf"', $content);
        $content = str_replace('href="/favicon.ico"', 'href="./favicon.ico"', $content);
        $content = str_replace('href="/favicon.svg"', 'href="./favicon.svg"', $content);
        $content = str_replace('href="/favicon-32x32.png"', 'href="./favicon-32x32.png"', $content);
        $content = str_replace('href="/favicon-16x16.png"', 'href="./favicon-16x16.png"', $content);
        $content = str_replace('href="/apple-touch-icon.png"', 'href="./apple-touch-icon.png"', $content);
        $content = str_replace('href="/site.webmanifest"', 'href="./site.webmanifest"', $content);
        $content = str_replace('src="/images/', 'src="./images/', $content);
        $content = str_replace('src="/storage/', 'src="./storage/', $content);
        $content = str_replace('href="/storage/', 'href="./storage/', $content);
        $content = str_replace("this.src='/storage/", "this.src='./storage/", $content);
        $content = str_replace('this.src="/storage/', 'this.src="./storage/', $content);

        // 4. Ensure CNAME exists for GitHub Pages custom domain
        $cnameTarget = base_path('docs/CNAME');
        if (! File::exists($cnameTarget)) {
            File::put($cnameTarget, "aimanhakim.homes\n");
        }

        File::put($indexPath, $content);

        // 5. Copy uploaded public storage files to docs/storage for static hosting
        $storageSource = storage_path('app/public');
        $storageTarget = base_path('docs/storage');

        if (File::isDirectory($storageSource)) {
            if (File::isDirectory($storageTarget)) {
                File::deleteDirectory($storageTarget);
            }

            File::ensureDirectoryExists($storageTarget);
            File::copyDirectory($storageSource, $storageTarget);

            // Remove .gitignore inside docs/storage so git tracks uploaded assets
            if (File::exists($storageTarget.'/.gitignore')) {
                File::delete($storageTarget.'/.gitignore');
            }

            if (count(File::allFiles($storageTarget)) === 0) {
                File::put($storageTarget.'/.gitkeep', '');
            }
        }

        $this->info('Static HTML and storage assets post-processed successfully for GitHub Pages!');

        return self::SUCCESS;
    }
}
