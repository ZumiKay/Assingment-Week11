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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/Register', function (){
    return view('Register');
})->name('auth.registerform');

Route::get('/login' , [\App\Http\Controllers\AuthController::class , 'Loginview']);
Route::get('/post' , [\App\Http\Controllers\PostController::class , 'postview']);
Route::get('/category' , [\App\Http\Controllers\CategoryController::class , 'categoryView']);
Route::post('/register' , [\App\Http\Controllers\AuthController::class,'Register'])->name('auth.Register');
Route::post('/login' , [\App\Http\Controllers\AuthController::class, 'Login'])->name('auth.Login');
Route::get('/logut' , [\App\Http\Controllers\AuthController::class, 'Logout'])->name('auth.Logout');
Route::post('/create-post' , [\App\Http\Controllers\PostController::class , 'createpost']);
Route::get('/post' , [\App\Http\Controllers\PostController::class,'getpost']);
Route::get('delete/{id}' , [\App\Http\Controllers\PostController::class , 'deletedpost']);
Route::post('editpost/{id}' , [\App\Http\Controllers\PostController::class , 'editpost']);
Route::get('user/{id}' , [\App\Http\Controllers\AuthController::class, 'getuserbyid']);
Route::get('/category' , [\App\Http\Controllers\CategoryController::class , 'getCategory']);


Route::middleware('admin_role')->group(function () {
    Route::post('/createCategory' , [\App\Http\Controllers\CategoryController::class , 'createCategory'])->name('createCategory');
    Route::post('editcategory/{id}' , [\App\Http\Controllers\CategoryController::class , 'editCategory']);
    Route::get('deletecategory/{id}', [\App\Http\Controllers\CategoryController::class, 'deleteCategory']);
});
