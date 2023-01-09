<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller('\App\Http\Controllers\Api\AuthController')->group(function(){
    Route::post('register', 'register'); // Signup
    Route::post('login', 'login'); // login
    
});

Route::controller('\App\Http\Controllers\Api\AboutController')->group(function(){
    Route::get('edit_about', 'edit_about');
    Route::post('update_about/{id}', 'update_about');
    
});
Route::controller('\App\Http\Controllers\Api\ServiceController')->group(function(){
    Route::get('get_all_service', 'get_all_service'); 
    Route::post('/create_service', 'create_service'); 
    Route::post('/update_service/{id}', 'update_service'); 
    Route::get('/delete_service/{id}', 'delete_service'); 
});
Route::controller('\App\Http\Controllers\Api\SkillController')->group(function(){
    Route::get('get_all_skill', 'get_all_skill'); 
    Route::post('/create_skill', 'create_skill'); 
    Route::post('/update_skill/{id}', 'update_skill'); 
    Route::get('/delete_skill/{id}', 'delete_skill'); 
});

