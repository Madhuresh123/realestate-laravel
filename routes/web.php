<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\backend\RoleController;
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

Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('/admin/dashboard', [adminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [adminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [adminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [adminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/change/password', [adminController::class, 'AdminChangePassword'])->name('admin.change.password');

    Route::post('/admin/update/password', [adminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    //property

    Route::get('/admin/property/alltype', [adminController::class, 'AdminPropertyAlltype'])->name('admin.property.alltype');
    // ->middleware('permission:all/type');

    Route::get('/admin/property/addtype', [adminController::class, 'AdminPropertyAddType'])->name('admin.property.addtype');
    // ->middleware('permission:add/type');

    //Add type
    Route::post('/property/addtype/store', [adminController::class, 'PropertyAddTypeStore'])->name('property.addtype.store');

    Route::get('/property/addtype/delete/{id}', [adminController::class, 'PropertyAddTypeDelete'])->name('property.addtype.delete');

    Route::get('/property/addtype/edit/{id}', [adminController::class, 'PropertyAddTypeEdit'])->name('property.addtype.edit');

    Route::post('/property/addtype/update', [adminController::class, 'PropertyAddTypeUpdate'])->name('property.addtype.update');

});

// Role Controller

Route::controller(RoleController::class)->group(function () {

    Route::get('/all/permision', [RoleController::class, 'AllPermission'])->name('all.permission');
    Route::get('/add/permision', [RoleController::class, 'AddPermission'])->name('add.permission');
    Route::post('/store/permision', [RoleController::class, 'StorePermission'])->name('store.permission');
    Route::get('/edit/permision/{id}', [RoleController::class, 'EditPermission'])->name('edit.permission');
    Route::post('/update/permision', [RoleController::class, 'UpdatePermission'])->name('update.permission');
    Route::get('/delete/permision/{id}', [RoleController::class, 'DeletePermission'])->name('delete.permission');
    Route::get('/import/permision', [RoleController::class, 'ImportPermission'])->name('import.permission');
    Route::get('/export', [RoleController::class, 'Export'])->name('export');
    Route::post('/import', [RoleController::class, 'Import'])->name('import');




    //roles
    Route::get('/all/roles', [RoleController::class, 'AllRoles'])->name('all.roles');
    Route::get('/add/roles', [RoleController::class, 'AddRoles'])->name('add.roles');
    Route::post('/store/roles', [RoleController::class, 'StoreRoles'])->name('store.roles');
    Route::get('/edit/roles/{id}', [RoleController::class, 'EditRoles'])->name('edit.roles');
    Route::post('/update/roles', [RoleController::class, 'UpdateRoles'])->name('update.roles');
    Route::get('/delete/roles/{id}', [RoleController::class, 'DeleteRoles'])->name('delete.roles');

    //all.roles.permission
    Route::get('/all/roles/permission', [RoleController::class, 'AllRolesPermission'])->name('all.roles.permission');
    Route::post('/role/permission/store', [RoleController::class, 'RolePermissionStore'])->name('role.permission.store');
    Route::get('roles/permission/view', [RoleController::class, 'RolesPermissionView'])->name('roles.permission.view');
    Route::get('admin/edit/role/{id}', [RoleController::class, 'AdminEditRole'])->name('admin.edit.role');
    Route::post('admin/role/update/{id}', [RoleController::class, 'AdminRoleUpdate'])->name('admin.role.update');
    Route::get('admin/delete/role/{id}', [RoleController::class, 'AdminDeleteRole'])->name('admin.delete.role');
});

Route::controller(adminController::class)->group(function () {

    Route::get('/all/admin', [adminController::class, 'AllAdmin'])->name('all.admin');
    Route::get('/add/admin', [adminController::class, 'AddAdmin'])->name('add.admin');
    Route::post('/store/admin', [adminController::class, 'StoreAdmin'])->name('store.admin');
    Route::get('/edit/admin/{id}', [adminController::class, 'EditAdmin'])->name('edit.admin');
    Route::post('/update/admin/{id}', [adminController::class, 'UpdateAdmin'])->name('update.admin');
    Route::get('/delete/admin/{id}', [adminController::class, 'DeleteAdmin'])->name('delete.admin');



});



Route::middleware(['auth','roles:agent'])->group(function(){

    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');

});

Route::get('/admin/login', [adminController::class, 'AdminLogin'])->name('admin.login');







