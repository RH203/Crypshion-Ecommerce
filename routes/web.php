<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\Logout;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\About;
use App\Livewire\Pages\App\Category;
use App\Livewire\Pages\App\Dashboard;
use App\Livewire\Pages\App\Feedback;
use App\Livewire\Pages\App\Orders;
use App\Livewire\Pages\App\OrderShow;
use App\Livewire\Pages\App\ProductAdd;
use App\Livewire\Pages\App\ProductDetail;
use App\Livewire\Pages\App\ProductEdit;
use App\Livewire\Pages\App\Products;
use App\Livewire\Pages\App\Subscribe;
use App\Livewire\Pages\Cart;
use App\Livewire\Pages\Category as PagesCategory;
use App\Livewire\Pages\ChangePassword;
use App\Livewire\Pages\Checkout;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\DetailProduk;
use App\Livewire\Pages\HelpCenter;
use App\Livewire\Pages\HelpCenterBotBobi;
use App\Livewire\Pages\HelpCenterDelivery;
use App\Livewire\Pages\HelpCenterErrorCode;
use App\Livewire\Pages\HelpCenterPayment;
use App\Livewire\Pages\Index;
use App\Livewire\Pages\OrderHistory;
use App\Livewire\Pages\OrderHistoryShow;
use App\Livewire\Pages\Profile;
use App\Livewire\Pages\TrackingOrder;
use App\Livewire\Pages\Product;
use App\Livewire\Pages\Orders as UserOrders;
use Illuminate\Support\Facades\Route;


// Global Route
Route::get('/', Index::class);
Route::get('/about', About::class);
Route::get('/contact', Contact::class);
Route::get('/products/{id}/show', DetailProduk::class);
Route::get('/products', Product::class);
Route::get('/category/{id}', PagesCategory::class);



// Guest Route
Route::middleware(['guest'])->group(function () {
  Route::get('/login', Login::class)->name('login');
  Route::get('/register', Register::class);

  Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
  Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');
});

Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [Logout::class, 'logout']);
});

// User Route
Route::middleware(['auth', 'role:user'])->group(function () {
  Route::get('/cart', Cart::class);
  Route::get('/checkout', Checkout::class);
  Route::get('/orders', UserOrders::class);
  Route::get('/order-history', OrderHistory::class);
  Route::get('/order-history/{code}', OrderHistoryShow::class);
  Route::get('/tracking-order/{code}', TrackingOrder::class);
  Route::get('/profile', Profile::class)->name('profile');
  Route::get('/profile/change-password', ChangePassword::class);
  Route::get('/help-center', HelpCenter::class);
  Route::get('/help-center/payment', HelpCenterPayment::class);
  Route::get('/help-center/delivery', HelpCenterDelivery::class);
  Route::get('/help-center/error-code', HelpCenterErrorCode::class);
  Route::get('/help-center/ask-bobi', HelpCenterBotBobi::class);
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
    Route::get('/orders/{code}', OrderShow::class);
    Route::get('/category', Category::class);
    Route::get('/feedback', Feedback::class);
    Route::get('/subscribes', Subscribe::class);
  });
});
