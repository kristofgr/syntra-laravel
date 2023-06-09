<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

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

/**
 * Get All Blog Posts
 *
 * info over endpoint om alle blog posts op te halen.
 *
 * Otherwise, the request will fail with a 400 error, and a response listing the failed services.
 *
 * @response 400 scenario="Service is unhealthy" {"status": "down", "services": {"database": "up", "redis": "down"}}
 * @responseField status The status of this API (`up` or `down`).
 * @responseField services Map of each downstream service and their status (`up` or `down`).
 */
Route::get('/blog-posts', [BlogPostController::class, 'index']);

Route::post('/blog-posts', [BlogPostController::class, 'store']);

Route::get('/blog-posts/{blogpost}', [BlogPostController::class, 'detail']);
Route::put('/blog-posts/{blogpost}', [BlogPostController::class, 'update']);
Route::patch('/blog-posts/{blogpost}', [BlogPostController::class, 'patch']);
Route::delete('/blog-posts/{blogpost}', [BlogPostController::class, 'destroy']);
