<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Other routes...

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/payments', [AdminController::class, 'managePayments'])->name('payments.index');
    Route::get('/bids', [AdminController::class, 'manageBids'])->name('admin.bids.index');
    Route::resource('items', AdminController::class, ['as' => 'admin'])->except(['show']);
    Route::resource('users', UserController::class, ['as' => 'admin'])->except(['show']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::resource('bids', BidController::class, ['as' => 'admin']);
    // Other admin routes...
});

// Other routes...

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard');

Route::get('/auction-history', [AuctionController::class, 'auctionHistory'])->name('auction-history');
Route::get('/auctions/{id}/edit', [AuctionController::class, 'edit'])->name('auctions.edit');

Route::get('/auctions', [AuctionController::class, 'index'])->name('auction.index');
Route::get('/auctions/create', [AuctionController::class, 'create'])->name('auctions.create');

Route::get('/auctions/{id}', [AuctionController::class, 'show'])->name('auction.show');
Route::post('/auctions/{id}/bid', [AuctionController::class, 'placeBid'])->name('auction.bid');

Route::get('/checkout/{id}', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('/checkout/{id}/process', [PaymentController::class, 'processPayment'])->name('payment.process');

Route::get('/admin', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
Route::get('/admin/item/{id}', [AdminController::class, 'manageItem'])->name('admin.manageItem');
Route::post('/admin/item/{id}/update', [AdminController::class, 'updateItem'])->name('admin.updateItem');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');

Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
Route::post('/settings', [UserController::class, 'updateSettings'])->name('user.updateSettings');

Route::get('/help/faq', [HelpController::class, 'faq'])->name('help.faq');

Route::get('/help/terms', [HelpController::class, 'terms'])->name('help.terms');

Route::get('/contact', [HelpController::class, 'contact'])->name('help.contact');
Route::post('/contact', [HelpController::class, 'sendContact'])->name('help.sendContact');

Route::get('/search', [AuctionController::class, 'search'])->name('auction.search');
//othet routes
Route::get('/notifications', [UserController::class, 'notifications'])->name('user.notifications');

Route::get('/admin', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

Route::get('/dashboard', [UserController::class, 'showDashboard'])->name('dashboard');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Social Login Routes
Route::get('login/google', [SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);

Route::get('login/github', [SocialAuthController::class, 'redirectToGitHub'])->name('login.github');
Route::get('login/github/callback', [SocialAuthController::class, 'handleGitHubCallback']);

// Other routes...

Route::get('/auctions', [AuctionController::class, 'index'])->name('auctions.index');

/// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/payments', [AdminController::class, 'managePayments'])->name('admin.payments.index');
    Route::resource('users', UserController::class, ['as' => 'admin'])->except(['show']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    // Other admin routes...
});

// Routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // ...existing code...
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    // ...existing code...
});

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Bid Management
Route::get('/bids', [BidController::class, 'index'])->name('admin.bids.index');
Route::get('/bids/{bid}', [BidController::class, 'show'])->name('admin.bids.show');
Route::get('/bids/{bid}/edit', [BidController::class, 'edit'])->name('admin.bids.edit');
Route::put('/bids/{bid}', [BidController::class, 'update'])->name('admin.bids.update');
Route::delete('/bids/{bid}', [BidController::class, 'destroy'])->name('admin.bids.destroy');

// Transaction Routes
Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');
Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('admin.transactions.show');


Route::prefix('admin')->middleware([])->group(function () {
    // ...existing code...
    Route::resource('categories', CategoryController::class)->names('admin.categories');

    Route::middleware(['auth', 'role:admin'])->group(function () {
        // isinya
        });

});



