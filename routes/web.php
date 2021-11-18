<?php

use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\UploadImageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\PseudoTypes\True_;

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
    return view('frontend.home.home');
});

Route::get('/storagelink',function(){
    $targetFolder = __DIR__. '/../storage/app/public';
    $linkFolder = __DIR__. '/../../public_html/storage';
   symlink($targetFolder, $linkFolder) or die("error creating symlink");
   echo 'Symlink process successfully completed';
});

Route::resource('tag', TagController::class);
Route::post('tag/image/upload/{tag}',[TagController::class,'imageStore'])->name('tag.uploadImage');
Route::post('tag/image/delete/{tag}',[TagController::class,'imageDelete'])->name('tag.deleteImage');

Auth::routes([
    'register' => true,
]);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
