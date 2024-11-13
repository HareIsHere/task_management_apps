<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

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

Route::get('admin',function(){
    return '<h1>Admin Page<h1>';
})->middleware(['auth','verified','role:admin']);

Route::get('manager',function(){
    return '<h1>Manager Page<h1>';
})->middleware(['auth','verified','role:manager|admin']);

Route::get('tugas',function(){
    return view('tugas');
})->middleware(['auth','verified','role_or_permission:lihat-tugas|admin']);

Route::resource('permissions', PermissionController::class);
Route::get('permissions/{permissionId}/delete', [PermissionController::class,'destroy']);
Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/delete', [RoleController::class,'destroy']);
Route::get('roles/{roleId}/give-permissions',[RoleController::class,'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions',[RoleController::class,'givePermissionToRole']);
Route::resource('tasks',TaskController::class);
Route::resource('user', UserController::class);

require __DIR__.'/auth.php';
