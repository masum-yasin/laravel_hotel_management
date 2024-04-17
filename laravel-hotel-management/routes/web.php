<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
//     return view('frontend.main_master');
// });
Route::get('/',[UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('frontend.Dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('profile/store',[UserController::class,'ProfileStore'])->name('profile.store');
    Route::get('user/logout',[UserController::class,'UserLogout'])->name('user.logout');
    Route::get('user/change/password',[UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('user/password/update',[UserController::class, 'UserPasswordUpdate'])->name('user.password.update');
  
});

require __DIR__.'/auth.php';

// Admin Group MiddleWare
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile',[AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store',[AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password',[AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin.password.updated',[AdminController::class, 'AdminPasswordUpdated'])->name('admin.password.updated');
});
// End Admin Middleware//

// Admin Login//
Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');

