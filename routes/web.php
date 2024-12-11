<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/gyms', [App\Http\Controllers\Gymcontroller::class, 'index'])->name('gyms');
Route::get('/coaches', [App\Http\Controllers\Coachcontroller::class, 'index'])->name('coaches');
Route::get('/classes', [App\Http\Controllers\Classcontroller::class, 'index'])->name('classes');

Route::get('/gym/$id', [App\Http\Controllers\Gymcontroller::class, 'show'])->name('gyms');
Route::get('/coaches/$id', [App\Http\Controllers\Coachcontroller::class, 'show'])->name('coaches');
Route::get('/classes/$id', [App\Http\Controllers\Classcontroller::class, 'show'])->name('classes');

Route::get('/gym/$id', [App\Http\Controllers\Gymcontroller::class, 'show'])->name('gym');
Route::get('/coaches/$id', [App\Http\Controllers\Coachcontroller::class, 'show'])->name('coach');
Route::get('/classes/$id', [App\Http\Controllers\Classcontroller::class, 'show'])->name('class');

Route::get('/$id/classes', [App\Http\Controllers\Gymcontroller::class, 'showClasses'])->name('gymClasses');
Route::get('/$id/coaches', [App\Http\Controllers\Gymcontroller::class, 'showCoaches'])->name('gymCoach');
Route::get('/$id/athletes', [App\Http\Controllers\Gymcontroller::class, 'showAthletes'])->name('gymAthletes');


Route::get('/$id/gyms', [App\Http\Controllers\Coachcontroller::class, 'showGyms'])->name('coachGyms');
Route::get('/$id/classes', [App\Http\Controllers\Coachcontroller::class, 'showClasses'])->name('coachClasses');
Route::get('/$id/athletes', [App\Http\Controllers\Coachcontroller::class, 'showAthletes'])->name('coachAthletes');

Route::get('/$id/gyms', [App\Http\Controllers\Athletecontroller::class, 'showGyms'])->name('athleteGyms');
Route::get('/$id/coaches', [App\Http\Controllers\Athletecontroller::class, 'showClasses'])->name('athelteCoaches');
Route::get('/$id/classes', [App\Http\Controllers\Athletecontroller::class, 'showAthletes'])->name('athleteClasses');
