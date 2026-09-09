<?php

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

test('guests cannot access the resume admin page', function () {
    $this->get(route('admin.resume.edit'))->assertRedirect(route('login'));
});

test('authenticated users can view the resume admin page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.resume.edit'))
        ->assertSuccessful()
        ->assertSee('Upload Resume');
});

test('authenticated users can upload a resume pdf', function () {
    $user = User::factory()->create();
    $pdf = UploadedFile::fake()->create('latest-resume.pdf', 120, 'application/pdf');

    $this->actingAs($user)
        ->put(route('admin.resume.update'), [
            'resume' => $pdf,
        ])
        ->assertRedirect(route('admin.resume.edit'))
        ->assertSessionHas('success');

    expect(File::exists(public_path('resume.pdf')))->toBeTrue();
});

test('resume upload rejects non pdf files', function () {
    $user = User::factory()->create();
    $file = UploadedFile::fake()->create('resume.txt', 100, 'text/plain');

    $this->actingAs($user)
        ->from(route('admin.resume.edit'))
        ->put(route('admin.resume.update'), [
            'resume' => $file,
        ])
        ->assertRedirect(route('admin.resume.edit'))
        ->assertSessionHasErrors('resume');
});
