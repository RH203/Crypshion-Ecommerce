<?php

use App\Http\Controllers\Auth\Logout;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\About;
use App\Livewire\Pages\App\Category;
use App\Livewire\Pages\App\Dashboard;
use App\Livewire\Pages\App\Feedback;
use App\Livewire\Pages\App\HelpCenter;
use App\Livewire\Pages\App\Orders;
use App\Livewire\Pages\App\ProductAdd;
use App\Livewire\Pages\App\ProductDetail;
use App\Livewire\Pages\App\ProductEdit;
use App\Livewire\Pages\App\Products;
use App\Livewire\Pages\Cart;
use App\Livewire\Pages\ChangePassword;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\DetailProduk;
use App\Livewire\Pages\Index;
use App\Livewire\Pages\Profile;
use App\Livewire\Pages\ProfileSetting;
use App\Livewire\Pages\TrackingOrder;
use App\Livewire\Pages\Product;
use Illuminate\Support\Facades\Route;


// Global Route
Route::get('/', Index::class);
Route::get('/about', About::class);
Route::get('/contact', Contact::class);
Route::get('/products/{id}/show', DetailProduk::class);
Route::get('/products', Product::class);


// Guest Route
Route::middleware(['guest'])->group(function () {
  Route::get('/login', Login::class)->name('login');
  Route::get('/register', Register::class);
});

Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [Logout::class, 'logout']);
});

// User Route
Route::middleware(['auth', 'role:user'])->group(function () {
  Route::get('/cart', Cart::class);
  Route::get('/tracking-order', TrackingOrder::class);
  Route::get('/profile', Profile::class)->name('profile');
  Route::get('/profile/settings', ProfileSetting::class);
  Route::get('/profile/change-password', ChangePassword::class);
});

// Admin Route
Route::middleware(['auth', 'role:admin'])->group(function () {
  Route::prefix('app')->group(function () {
    Route::get('/dashboard', Dashboard::class);
    Route::get('/products', Products::class);
    Route::get('/products/create', ProductAdd::class);
    Route::get('/products/edit', ProductEdit::class);
    Route::get('/products/{id}/show', ProductDetail::class);
    Route::get('/orders', Orders::class);
    Route::get('/category', Category::class);
    Route::get('/feedback', Feedback::class);
    Route::get('/help-center', HelpCenter::class);
  });
});
