@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl lg:text-4xl font-display font-bold">Resume</h1>
        <p class="text-muted-foreground mt-2">Upload a PDF resume. This replaces <code class="text-primary">public/resume.pdf</code> used by the navbar download button.</p>
    </div>

    <div class="glass-card p-6 lg:p-8 rounded-3xl space-y-6">
        @if($hasResume)
            <div class="rounded-2xl border border-border bg-background/40 p-5 space-y-3">
                <p class="text-sm font-medium text-foreground">Current resume</p>
                <ul class="text-sm text-muted-foreground space-y-1">
                    <li>File: <span class="text-foreground">resume.pdf</span></li>
                    <li>Size: <span class="text-foreground">{{ number_format(($resumeSize ?? 0) / 1024, 1) }} KB</span></li>
                    <li>Updated: <span class="text-foreground">{{ \Carbon\Carbon::createFromTimestamp($resumeUpdatedAt)->diffForHumans() }}</span></li>
                </ul>
                <a href="{{ $resumeUrl }}" target="_blank" rel="noopener noreferrer" class="btn-outline inline-flex text-sm">
                    View current resume
                </a>
            </div>
        @else
            <div class="rounded-2xl border border-border bg-background/40 p-5">
                <p class="text-sm text-muted-foreground">No resume uploaded yet. Upload a PDF below.</p>
            </div>
        @endif

        <form action="{{ route('admin.resume.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="form-label mb-2 block">Resume PDF</label>
                <input
                    type="file"
                    name="resume"
                    accept="application/pdf,.pdf"
                    required
                    class="form-input file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-primary-foreground hover:file:bg-primary/80"
                >
                <p class="mt-2 text-xs text-muted-foreground">PDF only, max 5 MB.</p>
                @error('resume')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end pt-4 border-t border-border">
                <button type="submit" class="btn-primary">
                    Upload Resume
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
