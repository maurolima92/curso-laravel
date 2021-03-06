<?php
use App\Http\Controllers\{
    PostController
};
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware(['auth'])->group(function(){
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('posts/edit/{id}',[PostController::class, 'edit'])->name('posts.edit');
    
    Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}',[PostController::class, 'show'])->name('posts.show');
    Route::put('posts/{id}',[PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{id}',[PostController::class, 'destroy'])->name('posts.destroy');
    Route::any('/post/search',[PostController::class, 'search'])->name('posts.search');
});

Route::get('/dashboad', function(){
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
