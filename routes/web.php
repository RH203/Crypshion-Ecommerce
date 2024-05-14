<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Pages\About;
use App\Livewire\Pages\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class);
Route::get('/login', Login::class);
Route::get('/register', Register::class);
Route::get('/about', About::class);
