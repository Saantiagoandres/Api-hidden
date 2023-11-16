<?php

use App\Http\Controllers\Api\UserController;
// use App\Http\Controllers\RegistrerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\HeadhunterController;
use App\Http\Controllers\Api\MultimediaController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\MessageController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::get('/create', function() {
    return'hola';
});

// Route::post('register',[RegistrerController::class,'store'])->name('api.v1.register');

Route::get('users', [UserController::class,'index'])->name('api.v1.users.index');
Route::post('users', [UserController::class,'store'])->name('api.v1.users.store');
Route::get('users/{user}', [UserController::class,'show'])->name('api.v1.users.show');
Route::put('users/{user}', [UserController::class,'update'])->name('api.v1.users.update');
Route::delete('users/{user}', [UserController::class,'destroy'])->name('api.v1.users.delete');

Route::get('candidates', [CandidateController::class,'index'])->name('api.v1.candidates.index');
Route::post('candidates', [CandidateController::class,'store'])->name('api.v1.candidates.store');
Route::get('candidates/{candidate}', [CandidateController::class,'show'])->name('api.v1.candidates.show');
Route::put('candidates/{candidate}', [CandidateController::class,'update'])->name('api.v1.candidates.update');
Route::delete('candidates/{candidate}', [CandidateController::class,'destroy'])->name('api.v1.candidates.delete');

Route::get('categories', [CategoryController::class,'index'])->name('api.v1.category.index');
Route::post('categories', [CategoryController::class,'store'])->name('api.v1.category.store');
Route::get('categories/{category}', [CategoryController::class,'show'])->name('api.v1.category.show');
Route::put('categories/{category}', [CategoryController::class,'update'])->name('api.v1.category.update');
Route::delete('categories/{category}', [CategoryController::class,'destroy'])->name('api.v1.category.delete');

Route::get('commentaries', [CommentaryController::class,'index'])->name('api.v1.commentaries.index');
Route::post('commentaries', [CommentaryController::class,'store'])->name('api.v1.commentariesc.store');
Route::get('commentaries/{commentary}', [CommentaryController::class,'show'])->name('api.v1.commentaries.show');
Route::put('commentaries/{commentary}', [CommentaryController::class,'update'])->name('api.v1.commentaries.update');
Route::delete('commentaries/{commentary}', [CommentatyController::class,'destroy'])->name('api.v1.commentariesdelete');


Route::get('headhunters', [HeadhunterController::class,'index'])->name('api.v1.headhunters.index');
Route::post('headhunters', [HeadhunterController::class,'store'])->name('api.v1.headhunters.store');
Route::get('headhunters/{headhunter}', [HeadhunterController::class,'show'])->name('api.v1.headhunters.show');
Route::put('headhunters/{headhunter}', [HeadhunterController::class,'update'])->name('api.v1.multimedias.update');
Route::delete('headhunters/{headhunter}', [HeadhunterController::class,'destroy'])->name('api.v1.headhunters.delete');


Route::get('roles', [RoleController::class,'index'])->name('api.v1.roles.index');
Route::post('roles', [RoleController::class,'store'])->name('api.v1.roles.store');
Route::get('roles/{role}', [RoleController::class,'show'])->name('api.v1.roles.show');
Route::put('roles/{role}', [RoleController::class,'update'])->name('api.v1.roles.update');
Route::delete('roles/{role}', [RoleController::class,'destroy'])->name('api.v1.roles.delete');

Route::get('multimedia', [MultimediaController::class,'index'])->name('api.v1.multimedia.index');
Route::post('multimedia', [MultimediaController::class,'store'])->name('api.v1.multimedia.store');
Route::get('multimedia/{multimedia}', [MultimediaController::class,'show'])->name('api.v1.multimedia.show');
Route::put('multimedia/{multimedia}', [MultimediaController::class,'update'])->name('api.v1.multimedia.update');
Route::delete('multimedia/{multimedia}', [MultimediaController::class,'destroy'])->name('api.v1.multimedia.delete');

Route::get('messages', [MessageController::class,'index'])->name('api.v1.messages.index');
Route::post('messages', [MessageController::class,'store'])->name('api.v1.messages.store');
Route::get('messages/{message}', [MessageController::class,'show'])->name('api.v1.messages.show');
Route::put('messages/{message}', [MessageController::class,'update'])->name('api.v1.messages.update');
Route::delete('messages/{message}', [MessageController::class,'destroy'])->name('api.v1.messages.delete');



