<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Portfolio Routes
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [PortfolioController::class, 'contact'])->name('contact.submit');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Hero Section
    Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
    Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

    // About Section
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');

    // Skills
    Route::resource('skills', SkillController::class);

    // Projects
    Route::resource('projects', ProjectController::class);

    // Experiences
    Route::resource('experiences', ExperienceController::class);

    // Services
    Route::resource('services', ServiceController::class);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);

    // Contact
    Route::get('/contact/messages', [ContactController::class, 'messages'])->name('contact.messages');
    Route::get('/contact/messages/{message}', [ContactController::class, 'showMessage'])->name('contact.messages.show');
    Route::patch('/contact/messages/{message}/read', [ContactController::class, 'markAsRead'])->name('contact.messages.read');
    Route::delete('/contact/messages/{message}', [ContactController::class, 'deleteMessage'])->name('contact.messages.delete');
    Route::get('/contact/info', [ContactController::class, 'editInfo'])->name('contact.info');
    Route::put('/contact/info', [ContactController::class, 'updateInfo'])->name('contact.info.update');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
