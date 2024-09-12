<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
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
 
Route::get('/', [HomeController::class, 'home'])->name('home');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'userHome'])->name('user.dashboard');
    Route::get('/articles', [ArticleController::class, 'userIndex'])->name('articles');
    Route::get('/articles/{id}', [ArticleController::class, 'userShow'])->name('articles.show');
});
 
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
    Route::get('/admin/articles', [ArticleController::class, 'index'])->name('admin/articles');
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])->name('admin/articles/create');
    Route::post('/admin/articles/store', [ArticleController::class, 'store'])->name('admin/articles/store');
    Route::get('/admin/articles/show/{id}', [ArticleController::class, 'show'])->name('admin/articles/show');
    Route::get('/admin/articles/edit/{id}', [ArticleController::class, 'edit'])->name('admin/articles/edit');
    Route::put('/admin/articles/edit/{id}', [ArticleController::class, 'update'])->name('admin/articles/update');
    Route::delete('/admin/articles/destroy/{id}', [ArticleController::class, 'destroy'])->name('admin/articles/destroy');
    Route::get('/admin/messages', [HomeController::class, 'allMessages'])->name('admin.messages');
});
 
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
});
 
Route::post('/contact-expert', [ContactController::class, 'store'])->name('contact.store');