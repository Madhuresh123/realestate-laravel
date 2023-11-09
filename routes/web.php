<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AgentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [adminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [adminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [adminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [adminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [adminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [adminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    //property

    Route::get('/admin/property/alltype', [adminController::class, 'AdminPropertyAlltype'])->name('admin.property.alltype');

    Route::get('/admin/property/addtype', [adminController::class, 'AdminPropertyAddType'])->name('admin.property.addtype');

    //Add type
    Route::post('/property/addtype/store', [adminController::class, 'PropertyAddTypeStore'])->name('property.addtype.store');

    Route::get('/property/addtype/delete/{id}', [adminController::class, 'PropertyAddTypeDelete'])->name('property.addtype.delete');

    Route::get('/property/addtype/edit/{id}', [adminController::class, 'PropertyAddTypeEdit'])->name('property.addtype.edit');

    Route::post('/property/addtype/update', [adminController::class, 'PropertyAddTypeUpdate'])->name('property.addtype.update');



});

Route::middleware(['auth','role:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

});

Route::get('/admin/login', [adminController::class, 'AdminLogin'])->name('admin.login');







