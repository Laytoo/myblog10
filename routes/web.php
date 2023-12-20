<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterSubscriptionController;
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

// Route::get('/', function () {
//     return view('Frontend.index');
// });

Auth::routes();
Route::get('/', [PostController::class, 'index'])->name('posts');

Route::group(['prefix'=>'posts'],function()
{
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/index', [PostController::class, 'index'])->name('posts');
    Route::get('/single/{id}', [PostController::class, 'single'])->name('userpost.single');
    Route::get('/create', [PostController::class, 'createPost'])->name('userpost.create');
    Route::post('/store', [PostController::class, 'StorePost'])->name('userpost.store');
    Route::get('/delete/{id}', [PostController::class, 'DeletePost'])->name('userpost.delete');


    Route::get('/edit/{id}', [PostController::class, 'EditPost'])->name('userpost.edit');
    Route::post('/update/{id}', [PostController::class, 'UpdatePost'])->name('userpost.update');


});

Route::group(['prefix'=>'categories'],function()
{

    Route::get('/category/{category}', [CategoryController::class, 'showCategory'])->name('category.single');


});

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login')->middleware('checkauth');
Route::post('admin/login', [AdminController::class, 'checkLogin'])->name('admin.check');

Route::group(['prefix'=>'admin'],function()
{

    Route::get('/', [AdminController::class, 'index'])->name('admins.dashboard');
    Route::get('/page', [AdminController::class, 'showUser'])->name('user.show');
    Route::get('/category', [AdminController::class, 'showCategory'])->name('category.show');
    Route::get('/category/store', [AdminController::class, 'storeCategory'])->name('category.store');
    Route::post('/category/create', [AdminController::class, 'createCategory'])->name('category.create');
    Route::get('/category-delete/{$id}', [AdminController::class, 'deleteCategory'])->name('category.delete');
    Route::get('/category-edit/{$id}', [AdminController::class, 'editCategory'])->name('category.edit');
    Route::post('/category/update', [AdminController::class, 'updateCategory'])->name('category.update');
    Route::get('/post/show', [AdminController::class, 'showPost'])->name('post.show');
    Route::get('/post-delete/{$id}', [AdminController::class, 'deletePost'])->name('post.delete');


});

Route::resource('newsletter-subscriptions', NewsletterSubscriptionController::class)->only('store');

Route::get('/send/mail/view/all', [AdminController::class, 'emailViewAll'])->name('send.email.view.all');

Route::post('/store/email/all', [AdminController::class, 'storeAllUserEmail'])->name('store.alluser.email');
