<?php

use App\Http\Controllers\AO_KNITTING\customer_relationship_management\DashboardController as CRMDashboardController;
use App\Http\Controllers\AO_KNITTING\document_management_system\DashboardController as DMSDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Add name here
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post'); // Add name here

// Password Reset Routes (if needed)
Route::get('/forgot-password', [LoginController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [LoginController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [LoginController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [LoginController::class, 'reset'])->name('password.update');

// CRM Dashboard Routes
Route::middleware(['auth'])->group(function () {
    // CRM Routes
    Route::get('/dashboard', [CRMDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/contract', [CRMDashboardController::class, 'contract'])->name('dashboard.contract');
    Route::get('/dashboard/communication', [CRMDashboardController::class, 'communication'])->name('dashboard.communication');
    Route::get('/dashboard/history', [CRMDashboardController::class, 'history'])->name('dashboard.history');
    Route::get('/dashboard/support', [CRMDashboardController::class, 'support'])->name('dashboard.support');
    Route::get('/dashboard/prospect', [CRMDashboardController::class, 'prospect'])->name('dashboard.prospect');
    Route::get('/dashboard/quote', [CRMDashboardController::class, 'quote'])->name('dashboard.quote');
    Route::get('/dashboard/sales', [CRMDashboardController::class, 'sales'])->name('dashboard.sales');

    // Document Management Routes
    Route::get('/dashboard/docs', [DMSDashboardController::class, 'index'])->name('dashboard.docs');
    Route::get('/dashboard/versioning', [DMSDashboardController::class, 'versioning'])->name('dashboard.versioning');
    Route::get('/dashboard/customer-contracts', [DMSDashboardController::class, 'contracts'])->name('dashboard.customer-contracts');
    Route::get('/dashboard/accounting', [DMSDashboardController::class, 'accounting'])->name('dashboard.accounting');
    Route::get('/dashboard/supplier-agreements', [DMSDashboardController::class, 'agreements'])->name('dashboard.supplier-agreements');
});
