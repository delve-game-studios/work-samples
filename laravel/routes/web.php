<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\ActivateAccountController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Front\IndexController;

/**
 * Main route
 */
$this->get('/', [IndexController::class, 'index'])->name('index');


/**
 * Auth
 */
$this->middleware([])->prefix('auth')->group(function () {
    $this->get('login', [LoginController::class, 'showLoginForm'])->name('login');
    $this->post('login', [LoginController::class, 'login']);
    $this->post('logout', [LoginController::class, 'logout'])->name('logout');

    $this->get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    $this->post('register', [RegisterController::class, 'register']);

    $this->get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    $this->post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    $this->get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    $this->post('password/reset', [ResetPasswordController::class, 'reset']);

    $this->get('activate', [ActivateAccountController::class, 'activate'])->name('activate');
    $this->post('activate', [ActivateAccountController::class, 'requestNewActivationEmail'])->name('activate.request');
    $this->get('unactivated', [ActivateAccountController::class, 'unactivated'])->name('unactivated');
});

/**
 * Admin
 */
$this->middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    $this->get('/', function () {
        return redirect()->route('admin.users.index');
    })->name('index');
    $this->get('dashboard', [UsersController::class, 'index'])->name('dashboard');

    $this->middleware([])->prefix('users')->name('users.')->group(function() {
        $this->get('/', [UsersController::class, 'index'])->name('index');
        $this->get('create', [UsersController::class, 'create'])->name('create');
        $this->get('edit/{user}', [UsersController::class, 'edit'])->name('edit');
        $this->post('create', [UsersController::class, 'store'])->name('store');
        $this->put('edit/{user}', [UsersController::class, 'update'])->name('update');
        $this->get('toggle-notification/{user}', [UsersController::class, 'toggleEmailNotification'])->name('toggle-notification');
        $this->get('toggle/{user}', [UsersController::class, 'toggle'])->name('toggle-status');
    });
});
