<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| control panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register control panel routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('cms')->middleware('auth:user')->group(function (){
    Route::get('/dashboard', function () {
        $slider_count = \App\Models\Slider::all()->count();
        $reviws = \App\Models\Opinion::all()->count();
        $jobs = \App\Models\Job::all()->count();
        $users = \App\Models\User::all();
        return view('cms.dashboard', [
            'slider_count' => $slider_count,
            'jobs' => $jobs,
            'reviws' => $reviws,
            'users' => $users,
        ]);
    })->name('dashboard');

    Route::resource('users', \App\Http\Controllers\cms\UserController::class);
    Route::post('users/{user}/update', [\App\Http\Controllers\cms\UserController::class, 'update']);
    Route::get('user/list', [\App\Http\Controllers\cms\UserController::class, 'getUsers'])->name('user.list');

    Route::get('user/{user}/updateProfile', [\App\Http\Controllers\cms\ProfileController::class, 'edit'])->name('updateProfile');
    Route::post('user/{user}/updateProfile', [\App\Http\Controllers\cms\ProfileController::class, 'edit']);

    Route::get('user/{user}/roles', [\App\Http\Controllers\cms\UserRoleController::class, 'index']);
    Route::post('user/{user}/roles', [\App\Http\Controllers\cms\UserRoleController::class, 'store']);

    Route::get('user/{user}/permissions', [\App\Http\Controllers\cms\UserPermissionController::class, 'permission']);
    Route::post('user/{user}/permissions', [\App\Http\Controllers\cms\UserPermissionController::class, 'store']);

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

    Route::resource('socialMedia', \App\Http\Controllers\cms\SocialMediaController::class);
    Route::get('socialMedias/list', [\App\Http\Controllers\cms\SocialMediaController::class, 'getSocialMedia'])->name('socialMedia.list');

    Route::get('logo/edit', [\App\Http\Controllers\cms\LogoController::class, 'edit'])->name('logo.edit');
    Route::post('logo/update', [\App\Http\Controllers\cms\LogoController::class, 'update']);

    Route::get('album/images', [\App\Http\Controllers\cms\AlbumController::class, 'getImages'])->name('album.images');

    Route::resource('permissions', \App\Http\Controllers\cms\PermissionController::class);
    Route::get('permission/list', [\App\Http\Controllers\cms\PermissionController::class, 'getPermissions'])->name('permission.list');
    Route::resource('roles', \App\Http\Controllers\cms\RoleController::class);
    Route::get('role/list', [\App\Http\Controllers\cms\RoleController::class, 'getRoles'])->name('role.list');
    Route::get('role/{role}/permissions', [\App\Http\Controllers\cms\RolePermissionController::class, 'permission'])->name('role.permissions');
    Route::post('role/{role}/permissions', [\App\Http\Controllers\cms\RolePermissionController::class, 'store']);

    Route::get('cms/logout', [\App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');

    Route::get('/push-notificaiton', [\App\Http\Controllers\messages\WebNotificationController::class, 'index'])->name('push-notificaiton');
    Route::post('/store-token', [\App\Http\Controllers\messages\WebNotificationController::class, 'storeToken'])->name('store.token');
    Route::post('/send-web-notification', [\App\Http\Controllers\messages\WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
});

Route::prefix('cms')->middleware('guest:user')->group(function(){

    Route::get('login', [\App\Http\Controllers\auth\AuthController::class, 'getLoginView'])->name('login');
    Route::post('login', [\App\Http\Controllers\auth\AuthController::class, 'login']);
});
