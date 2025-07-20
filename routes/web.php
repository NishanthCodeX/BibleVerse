<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Models\BibleVerse;

Route::get('/', [PageController::class,'home'])->name('home');
Route::get('/user/profile', [PageController::class,'logprofilein'])->name('profile');
Route::get('/user/login', [PageController::class,'login'])->name('login');
Route::get('/master/{ulink}', [PageController::class,'verseProjectMaster'])->name('verse.project.master');
Route::get('/verse/project/{id}', [PageController::class,'verseProject'])->name('verse.project');
Route::get('/chapters/{book_id}', function ($book_id) {
    return BibleVerse::where('book_id', $book_id)->distinct()->pluck('chapter');
});

Route::get('/verses/{book_id}/{chapter}', function ($book_id, $chapter) {
    return BibleVerse::where('book_id', $book_id)
        ->where('chapter', $chapter)
        ->orderBy('verse')
        ->get(['verse', 'text_ta', 'chapter']);
});

Route::prefix('/admin')->group(function () {
    Route::get('', [AdminController::class, 'home'])->middleware('AdminAuth')->name('admin');
    Route::get('/login', [AdminController::class, 'login'])->middleware('AdminGuest')->name('admin.login');
    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/password', [AdminController::class, 'password'])->middleware('AdminAuth')->name('admin.password');
    Route::post('/password', [AdminController::class, 'passwordUpdate'])->middleware('AdminAuth')->name('admin.password.update');
    Route::get('/settings', [AdminController::class, 'settings'])->middleware('AdminAuth')->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'settingsUpdate'])->middleware('AdminAuth')->name('admin.settings.update');
    Route::get('/project', [AdminController::class, 'projectVerse'])->middleware('AdminAuth')->name('admin.project');
    Route::post('/project-verse/store', [AdminController::class, 'projectVerseStore'])->middleware('AdminAuth')->name('admin.project-verse.store');

});

