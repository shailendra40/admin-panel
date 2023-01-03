<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteSettingController;

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
    return view('welcome');
});

// FOR ADMIN 

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');



// FOR SITESETTING
Route::get('admin/sitesetting/index',[SiteSettingController::class,'index'])->name('admin.sitesetting.index');

// FOR ABOUT
Route::get('admin/about/index',[AboutController::class,'index'])->name('admin.about.index');
Route::get('admin/about/create',[AboutController::class,'create'])->name('admin.about.create');
Route::post('admin/about/store',[AboutController::class,'store'])->name('admin.about.store');
Route::get('admin/about/edit/{id}',[AboutController::class,'edit'])->name('admin.about.edit');
Route::post('admin/about/update',[AboutController::class,'update'])->name('admin.about.update');
Route::get('admin/about/destroy/{id}',[AboutController::class,'destroy'])->name('admin.about.destroy');
