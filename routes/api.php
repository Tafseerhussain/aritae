<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ContactResponseController;
use App\Http\Controllers\API\BlogController;

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

Route::post('contact-response', [ContactResponseController::class, 'create']);

//Blogs
Route::get('blog/get-blogs', [BlogController::class, 'getBlogs']);
Route::get('blog/get-blogs/category/{id}', [BlogController::class, 'getCategoryBlogs']);
Route::get('blog/categories', [BlogController::class, 'getCategories']);
Route::get('blog/latest-posts', [BlogController::class, 'getLatestPosts']);
Route::get('blog/get-blog/{id}', [BlogController::class, 'getBlog']);
Route::get('blog/get-related-blogs/{id}', [BlogController::class, 'getRelatedBlogs']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
