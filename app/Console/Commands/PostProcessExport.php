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

        // 2. Convert absolute local host URLs (http://portfolio.test/ or http://localhost/) to relative paths
        $content = preg_replace('#http://portfolio\.test/#', './', $content);
        $content = preg_replace('#http://localhost/#', './', $content);

        // 3. Convert root-relative paths like href="/build/" or src="/images/" to relative paths
        $content = str_replace('href="/build/', 'href="./build/', $content);
        $content = str_replace('src="/build/', 'src="./build/', $content);
        $content = str_replace('href="/resume.pdf"', 'href="./resume.pdf"', $content);
        $content = str_replace('href="/favicon.ico"', 'href="./favicon.ico"', $content);
        $content = str_replace('src="/images/', 'src="./images/', $content);

        File::put($indexPath, $content);

        $this->info('Static HTML post-processed successfully with relative asset paths for GitHub Pages!');

        return self::SUCCESS;
    }
}
