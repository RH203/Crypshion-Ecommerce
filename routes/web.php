<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\App\Dashboard;
use App\Livewire\Pages\App\Products;
use App\Livewire\Pages\Cart;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Index;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class);
Route::get('/register', Register::class);


Route::get('/', Index::class);
Route::get('/contact', Contact::class);
Route::get('/cart', Cart::class);


Route::prefix('app')->group(function () {
  Route::get('/dashboard', Dashboard::class);
  Route::get('/products', Products::class);
});
