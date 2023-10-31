<?php

use App\Models\Category;
use App\Models\Story;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Log in with user 1
Auth::loginUsingId(1);


Route::get('/', function () {
    $stories = Story::with('categories')->get();    
    return view('welcome', ['stories' => $stories]);
});

Route::get('/categories', function () {
    $categories = Category::all();
    return view('categories', ['categories' => $categories]);
});

Route::get('/admin', function () {
    return view('admin');
})->middleware('can:admin');

Route::get('/insert', function () {
    echo "Insere utilizador";
})->middleware('can:insert_user');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
