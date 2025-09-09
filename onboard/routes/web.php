<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientOnboardingController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// Admin dashboard route
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard home page 
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');

    // Users list 
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin_show_user_form');

    
});


// User dashboard routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('onborad.userDashboard');
    })->name('user.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/form', function () {
        return view('onborad.form.index');
    })->name('user.form');
});




Route::get('/client-onboarding', [ClientOnboardingController::class, 'create'])->name('client.create');
Route::post('/client-onboarding', [ClientOnboardingController::class, 'store'])->name(name: 'client.store');

Route::get('/client-onboarding/{id}', [ClientOnboardingController::class, 'show'])->name('client.show');




// Admin client view
Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/client/{id}', [ClientOnboardingController::class, 'adminShow'])->name('admin.client.show');
});

