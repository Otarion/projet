<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EncyclopediaController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Connexion et inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Chemin vers l'index
Route::get('/', [PostController::class, 'index'])->name('index');
//Chemin vers l'actualité
Route::get('/actualités', [PostController::class, 'news'])->name('news');
// Chemin des catégories (news)
Route::get('/categories/{category}', [PostController::class,'postsByCategory'])->name('posts.byCategory');
//Chemin vers l'encyclopédie
Route::get('/encyclopédie', [EncyclopediaController::class, 'ency'])->name('ency');
//Chemin des types (encyclopedia)
Route::get('/type/{type}',[EncyclopediaController::class, 'encyclopediasByType'])->name('encyclopedias.byType');
//Chemin par types (encyclopedia)
Route::get('type/{type}', 'EncyclopediaController@byType')->name('encyclopedias.byType');
//Chemin vers A propos
Route::get('/faq', [FAQController::class, 'faq'])->name('faq');

//Chemin vers les posts (news)
Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
//Chemin vers les pages (encyclopledia)
Route::get('{/{encyclopedia}', [EncyclopediaController::class, 'show'])->name('encyclopedia.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
