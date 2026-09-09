<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ResumeController extends Controller
{
    public function edit(): View
    {
        $resumePath = public_path('resume.pdf');
        $hasResume = File::exists($resumePath);

        return view('admin.resume.edit', [
            'hasResume' => $hasResume,
            'resumeUrl' => $hasResume ? asset('resume.pdf') : null,
            'resumeUpdatedAt' => $hasResume ? File::lastModified($resumePath) : null,
            'resumeSize' => $hasResume ? File::size($resumePath) : null,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'resume' => ['required', 'file', 'mimes:pdf', 'max:5120'],
        ]);

        $request->file('resume')->move(public_path(), 'resume.pdf');

        return redirect()
            ->route('admin.resume.edit')
            ->with('success', 'Resume updated successfully! Run php artisan export before deploying to GitHub Pages.');
    }
}
