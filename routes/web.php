<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\SwimmerController;
use Illuminate\Support\Facades\Password;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes (Logged in users only)
Route::middleware(['auth'])->group(function () {

    // Role-based dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin-only routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/extra', fn() => 'Admin only');

         Route::get('/swimmers', [SwimmerController::class, 'index'])->name('swimmers.index');

        Route::get('/swimmers/create', [SwimmerController::class, 'create'])->name('swimmers.create');

        Route::post('/swimmers', [SwimmerController::class, 'store'])->name('swimmers.store');

        Route::get('/swimmers/{id}/edit', [SwimmerController::class, 'edit'])->name('swimmers.edit');

        Route::put('/swimmers/{id}', [SwimmerController::class, 'update'])->name('swimmers.update');
        
        Route::delete('/swimmers/{id}', [SwimmerController::class, 'destroy'])->name('swimmers.destroy');
    });

    // User-only routes
    Route::middleware('user')->group(function () {
        Route::get('/user/extra', fn() => 'User only');
    });
});


// Password reset routes
Route::get('forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('forgot-password', function (Illuminate\Http\Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return back()->with('status', __($status));
})->middleware('guest')->name('password.email');

Route::get('reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('reset-password', function (Illuminate\Http\Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = \Hash::make($password);
            $user->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.update');

