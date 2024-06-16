<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\tenantController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\roomTypeController;
use App\Http\Controllers\paymentHistoryController;
use App\Http\Controllers\licenseAgreementController;
use App\Http\Controllers\ForgotPasswordController;

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


Route::get('/forgot-password',[ForgotPasswordController::class,'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password',[ForgotPasswordController::class,'forgotPasswordPost'])->name('forgot.password.post');
Route::get('/reset-password/{token}',[ForgotPasswordController::class,'resetPassword'])->name('reset.password');
Route::post('/reset-password/',[ForgotPasswordController::class,'resetPasswordPost'])->name('reset.password.post');

Route::middleware(['auth','role:admin|user'])->name('admin.')->prefix('admin')->group(function(){
   
    Route::get('/dashboard', [userController::class,'adminDashboard'])->name("dashboard");
    // Route::resource('/permissions', PermissionController::class);
    Route::get('permissions', [PermissionController::class,'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionController::class,'create'])->name('permissions.create');
    Route::post('permissions', [PermissionController::class,'store'])->name('permissions.store');
    Route::post('permissions/{permission}/edit', [PermissionController::class,'edit'])->name('permissions.edit');
    Route::put('permissions/{permission}', [PermissionController::class,'update'])->name('permissions.update');
    Route::delete('permissions/{permission}', [PermissionController::class,'destroy'])->name('permissions.destroy');
    Route::get('roles', [RoleController::class,'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class,'create'])->name('roles.create');
    Route::post('roles', [RoleController::class,'store'])->name('roles.store');
    Route::get('roles/{role}/edit', [RoleController::class,'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RoleController::class,'update'])->name('roles.update');
    Route::delete('roles/{role}', [RoleController::class,'destroy'])->name('roles.destroy');
    Route::get('roles/{role}/permissions', [RoleController::class,'showRolePermission'])->name('roles.permission.index');
    Route::Post('roles/{role}', [RoleController::class,'givePermission'])->name('roles.permissions');
    Route::delete('roles/{role}/permissions/{permission}', [RoleController::class,'revokePermission'])->name('roles.permissions.revoke');
    // Route::resource('/roles', RoleController::class);


    Route::get('users',[userController::class,'index'])->name('users.index');
    Route::get('users/create',[userController::class,'create'])->name('users.create')->middleware('permission:create user');
    Route::post('users',[userController::class,'store'])->name('users.store')->middleware('permission:create user');
    Route::post('users/{user}/edit',[userController::class,'edit'])->name('users.edit')->middleware('permission:update user');
    Route::put('users/update',[userController::class,'update'])->name('users.update')->middleware('permission:update user');
    Route::get('users/{user}',[userController::class,'show'])->name('users.show');
    Route::delete('users/{user}',[userController::class,'destroy'])->name('users.destroy')->middleware('permission:delete user');
    Route::post('/users/{user}/roles',[userController::class,'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}',[userController::class,'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions',[userController::class,'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}',[userController::class,'revokePermission'])->name('users.permissions.revoke');
});


Route::middleware(['auth','role:admin|user'])->prefix('room')->group(function(){

    Route::get('type/create', [roomTypeController::class,'showCreateRoomType'])->name("show.room.type.create")->middleware('permission:create room type');
    Route::post('type/create', [roomTypeController::class,'createRoomType'])->name("room.type.create")->middleware('permission:create room type');
    Route::put('type/edit', [roomTypeController::class,'editRoomType'])->name("room.type.edit")->middleware('permission:update room type');
    Route::post('type/update', [roomTypeController::class,'updateRoomType'])->name("room.type.update")->middleware('permission:update room type');
    Route::delete('type/delete', [roomTypeController::class,'destroy'])->name("room.type.delete")->middleware('permission:delete room type');
    
    Route::get('create', [roomController::class,'showCreateRoom'])->name("show.room.create")->middleware('permission:create room');
    Route::post('create', [roomController::class,'createRoom'])->name("room.create")->middleware('permission:create room');
    Route::get('add/{id}', [roomController::class,'showAddRoom'])->name("show.room.add");
    Route::post('add', [roomController::class,'addRoom'])->name("room.add");
    Route::post('edit', [roomController::class,'editRoom'])->name("room.edited")->middleware('permission:update room');
    Route::put('update', [roomController::class,'updateRoom'])->name("room.update")->middleware('permission:update room');
    Route::get('tenant/{id}', [roomController::class,'show'])->name("room.show")->middleware('permission:view tenant room');
    Route::delete('delete', [roomController::class,'destroy'])->name("room.delete")->middleware('permission:delete room');
    Route::post('release', [roomController::class,'ReleaseRoom'])->name("room.release")->middleware('permission:release room');
    Route::post('detail', [roomController::class,'Detail'])->name("room.detail")->middleware('permission:view room detail');
    Route::get('show', [roomController::class,'showRoom'])->name("room")->middleware('permission:view room');
});




Route::group(['middleware' => 'auth','role:admin'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/logout', [userController::class,'logout'])->name("user.logout");
    Route::get('/dashboard', [userController::class,'dashboard'])->name("user.dashboard");

    Route::post('/tenant/create', [tenantController::class,'showCreateTenant'])->name("show.tenant.create")->middleware('permission:renting permission');
    Route::post('/tenant/create/{id}', [tenantController::class,'createTenant'])->name("tenant.create")->middleware('permission:renting permission');
    Route::get('/tenant/edit/{id}', [tenantController::class,'editTenant'])->name("tenant.edit")->middleware('permission:update tenant');
    Route::post('/tenant/update', [tenantController::class,'updateTenant'])->name("tenant.update")->middleware('permission:update tenant');
    Route::get('/tenant/show', [tenantController::class,'show'])->name("tenant.show")->middleware('permission:view tenant');
    Route::delete('/tenant/delete', [tenantController::class,'destroy'])->name("tenant.delete")->middleware('permission:delete tenant');

    Route::post('/license/edit', [licenseAgreementController::class,'editLicense'])->name("license.edit");
    Route::put('/license/update', [licenseAgreementController::class,'updateLicense'])->name("license.update");
    Route::get('/license/show/{id}', [licenseAgreementController::class,'show'])->name("license.show");
    Route::get('/create/license/{id}', [licenseAgreementController::class,'showCreateNewAgreement'])->name("show.create.newlicense");
    Route::post('/create/license/{id}', [licenseAgreementController::class,'createNewAgreement'])->name("create.newlicense");
    Route::delete('/license/delete', [licenseAgreementController::class,'destroy'])->name("license.delete");
    
    
    Route::post('/payment/edit', [paymentHistoryController::class,'editPayment'])->name("payment.edit");
    Route::put('/payment/update', [paymentHistoryController::class,'updatePayment'])->name("payment.update");
    Route::get('/payment/show/{id}', [paymentHistoryController::class,'show'])->name("payment.show");
    Route::get('/create/payment/{id}', [paymentHistoryController::class,'showCreatePayment'])->name("show.create.payment");
    Route::post('/create/payment/{id}', [paymentHistoryController::class,'createPayment'])->name("create.payment");
    Route::delete('/payment/delete', [paymentHistoryController::class,'destroy'])->name("payment.delete");
});








   Route::get('/register', [userController::class,'showRegister'])->name("user.showRegister");
   Route::post('/register', [userController::class,'Register'])->name("user.Register");
  Route::get('/login', [userController::class,'showLogin'])->name("user.showLogin");
  Route::post('/login', [userController::class,'Login'])->name("user.Login");
