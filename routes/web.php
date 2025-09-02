<?php

use App\Http\Controllers\{
  HomeController, PostController, PageController, EventController, ContactMessageController
};
use Illuminate\Support\Facades\Route;

// Publik
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/berita', [PostController::class,'index'])->name('posts.index');
Route::get('/berita/{slug}', [PostController::class,'show'])->name('posts.show');
Route::get('/hal/{slug}', [PageController::class,'show'])->name('pages.show');
Route::get('/agenda', [EventController::class,'index'])->name('events.index');
Route::get('/kontak', [ContactMessageController::class,'create'])->name('contact.create');
Route::post('/kontak', [ContactMessageController::class,'store'])->name('contact.store');

// Admin (butuh login)
Route::middleware('auth')->group(function(){
  Route::view('/admin','admin.dashboard')->name('admin.dashboard');
  // Admin lists
  Route::get('/admin/posts', [PostController::class,'adminIndex'])->name('admin.posts.index');
  Route::get('/admin/pages', [PageController::class,'adminIndex'])->name('admin.pages.index');
  Route::get('/admin/events', [EventController::class,'adminIndex'])->name('admin.events.index');
  Route::resource('/admin/posts', PostController::class)->except(['index','show']);
  Route::resource('/admin/events', EventController::class)->except(['index','show']);
  Route::resource('/admin/pages', PageController::class)->except(['show']);
  Route::get('/admin/messages',[ContactMessageController::class,'index'])->name('admin.messages');
  Route::delete('/admin/messages/{message}',[ContactMessageController::class,'destroy'])->name('admin.messages.destroy');
});

// Auth sederhana (session)
Route::get('/login',[HomeController::class,'loginForm'])->name('login');
Route::post('/login',[HomeController::class,'login']);
Route::post('/logout',[HomeController::class,'logout'])->name('logout');
