<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ConfigSiteController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Frontend\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
Route::get('/storagelink',function(){
    $targetFolder = __DIR__. '/../storage/app/public';
    $linkFolder = __DIR__. '/../../public_html/storage';
   symlink($targetFolder, $linkFolder) or die("error creating symlink");
   echo 'Symlink process successfully completed';
});*/

Route::get('/',[WebsiteController::class,'index'])->name('welcome');
Route::get('contacto',[ContactController::class,'index'])->name('contact');
Route::post('contacto/email',[ContactController::class,'sendMail'])->name('contact.mail');
Route::get('noticias/{category}',[CategoryController::class,'posts'])->name('category.posts');
Route::get('noticias',[FrontendPostController::class,'index'])->name('web.posts');
Route::get('noticias/todos/{slug}',[FrontendPostController::class,'show'])->name('web.post');

Auth::routes([
    'register' => false,
]);

Route::middleware(['auth'])->group(function () {

Route::get('dashboard/website', [ConfigSiteController::class,'index'])->name('website.index');
Route::post('dashboard/store/website', [ConfigSiteController::class,'store'])->name('website.store');
Route::patch('dashboard/website/{website}/update', [ConfigSiteController::class,'update'])->name('website.update');
Route::post('dashboard/website/image/upload/{website}',[ConfigSiteController::class,'imageStore'])->name('website.uploadImage');
Route::post('dashboard/website/{website}', [ConfigSiteController::class,'imageDelete'])->name('website.deleteImage');
Route::get('dashboard/website/{website}', [ConfigSiteController::class,'show'])->name('website.logo');
Route::post('dashboard/website/image/link/{model}/{id}',[ConfigSiteController::class,'linkImage'])->name('website.linkImage');

Route::resource('dashboard/tag', TagController::class);
Route::post('dashboard/tag/image/upload/{tag}',[TagController::class,'imageStore'])->name('tag.uploadImage');
Route::post('dashboard/tag/image/delete/{tag}',[TagController::class,'imageDelete'])->name('tag.deleteImage');
Route::post('dashboard/tag/image/link/{model}/{id}',[TagController::class,'linkImage'])->name('tag.linkImage');

Route::resource('dashboard/category', CategoryController::class);
Route::post('dashboard/category/image/upload/{category}',[CategoryController::class,'imageStore'])->name('category.uploadImage');
Route::post('dashboard/category/image/delete/{category}',[CategoryController::class,'imageDelete'])->name('category.deleteImage');
Route::post('dashboard/category/image/link/{model}/{id}',[CategoryController::class,'linkImage'])->name('category.linkImage');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('dashboard/user', UserController::class);
Route::resource('dashboard/post', PostController::class);
Route::post('dashboard/post/image/upload/{post}',[PostController::class,'imageStore'])->name('post.uploadImage');
Route::post('dashboard/post/image/delete/{post}',[PostController::class,'imageDelete'])->name('post.deleteImage');
Route::post('dashboard/post/image/link/{model}/{id}',[PostController::class,'linkImage'])->name('post.linkImage');
});

