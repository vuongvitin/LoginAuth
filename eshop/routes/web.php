<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Users\LoginController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::get('403', function(){
    return view('tag.403');
})->name('403');

Route::middleware(['auth', 'admin.access'])->group(function(){

    Route::prefix('admin')->group(function() {
        
    Route::get('/', [MainController::class, 'index']) -> name('admin');

    Route::get('main', [MainController::class, 'index']);



    #Menu
    Route::prefix('menus')->group(function() {

        Route::get('add', [MenuController::class, 'create']);

        Route::post('add', [MenuController::class, 'store']);
        
        Route::get('list', [MenuController::class, 'index']);
    });


});
    
});
