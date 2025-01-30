<?php

use App\Http\Controllers\ProfileController;
use App\Http\Resources\JobListingResource;
use App\Models\JobListing;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
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

Route::get('/dashboard', function (Request $request) {
    $jobs = JobListing::query()
        ->when(
            $request->has('search'),
            fn ($query) => $query->where('title', 'like', '%' . $request->input('search') . '%')
        )
        ->when(
            $request->has('location'),
            fn ($query) => $query->where('location', 'like', '%' . $request->input('location') . '%')
        )
        ->with('skills')
        ->latest()
        ->paginate();

    return Inertia::render('Dashboard', [
        'jobs' => JobListingResource::collection($jobs),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
