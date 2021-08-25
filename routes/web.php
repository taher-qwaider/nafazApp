<?php

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
Route::view('test', 'cms.index');
Route::get('/', function () {
    return view('cms.dashboard');
})->name('dashboard');

Route::resource('sliders', \App\Http\Controllers\cms\SliderController::class);
Route::get('slider/list', [\App\Http\Controllers\cms\SliderController::class, 'getSliders'])->name('sliders.list');
Route::post('slider/{slider}/update', [\App\Http\Controllers\cms\SliderController::class, 'update']);

Route::get('settings/{subject}', [\App\Http\Controllers\cms\SettingController::class, 'index'])->name('settings.index');
Route::post('settings/{subject}', [\App\Http\Controllers\cms\SettingController::class, 'store'])->name('settings.store');
Route::put('settings/{setting}', [\App\Http\Controllers\cms\SettingController::class, 'update'])->name('settings.update');
Route::delete('settings/{setting}', [\App\Http\Controllers\cms\SettingController::class, 'destroy'])->name('settings.destroy');
Route::get('get/{subject}/data', [\App\Http\Controllers\cms\SettingController::class, 'getData'])->name('settings.data');
Route::get('setting/{subject}/create', [\App\Http\Controllers\cms\SettingController::class, 'create'])->name('setting.create');
Route::get('setting/{setting}/edit', [\App\Http\Controllers\cms\SettingController::class, 'edit'])->name('setting.edit');

Route::resource('services', \App\Http\Controllers\cms\ServiceController::class);
Route::post('services/{service}/update',[\App\Http\Controllers\cms\ServiceController::class, 'update']);
Route::get('service/list', [\App\Http\Controllers\cms\ServiceController::class, 'getServices'])->name('service.list');

Route::resource('categories', \App\Http\Controllers\cms\CategoryController::class);
Route::get('category/list', [\App\Http\Controllers\cms\CategoryController::class, 'getCategories'])->name('category.list');

Route::resource('jobs', \App\Http\Controllers\cms\JobController::class);
Route::get('job/list', [\App\Http\Controllers\cms\JobController::class, 'getJobs'])->name('job.list');

Route::resource('images', \App\Http\Controllers\cms\ImageController::class);
Route::delete('image/delete', [\App\Http\Controllers\cms\ImageController::class, 'delete'])->name('image.delete');

Route::resource('opinions', \App\Http\Controllers\cms\OpinionController::class);
Route::get('opinion/list', [\App\Http\Controllers\cms\OpinionController::class, 'getOpinions'])->name('opinion.list');

Route::resource('blogs', \App\Http\Controllers\cms\BlogController::class);
Route::get('blog/list', [\App\Http\Controllers\cms\BlogController::class, 'getBlogs'])->name('blog.list');
Route::post('blogs/{blog}/update',[\App\Http\Controllers\cms\BlogController::class, 'update']);
