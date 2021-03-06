<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\Role;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $users = User::all();
    return view('welcome', compact('users'));
})->middleware(['auth'])->name('home');



Route::get('/accueil', function () {
    $users = User::all();
    return view('pages.accueil', compact('users'));
})->name('accueil');



Route::resource('article', ArticleController::class)->middleware(['auth']);
Route::resource('role', RoleController::class);


Route::get('/users', function () {
    $users = User::all();
    $role = Role::all();
    return view('partials.users', compact('users', 'role'));
})->middleware(['auth', 'admin'])->name('users');



Route::get('/admin', function () {
    return view('partials.backofficebackoffice');
})->middleware(['auth', 'admin'])->name('admin');



Route::get('/dashboard', function () {
    $users = User::all();
    return view('dashboard', compact('users'));
})->middleware(['auth'])->name('dashboard');

Route::delete('/delete/{id}', [UserController::class, 'destroy'] );

require __DIR__.'/auth.php';


Route::get('/bar', [TestController::class, 'bar']);

Route::get('/contact-form', [ContactController::class, 'showForm']);

Route::post('/contact-form', [ContactController::class, 'storeForm'])->name('contact.save');



