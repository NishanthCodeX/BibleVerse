<?php

use App\Http\Controllers\BibleApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/chapters/{book_id}', [BibleApiController::class, 'getChapters']);
Route::get('/verses/{book_id}/{chapter}', [BibleApiController::class, 'getVerses']);
Route::get('/project-verse/latest/{ulink}', [BibleApiController::class, 'getVerseMaster']);