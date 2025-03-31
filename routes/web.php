<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


   Route::get('/', function () {
     return view('welcome');
   });

   Route::view('welcome2', 'welcome') -> name('Welcome');//Llamar solo la vista

   Route::get('/develop', function(){ 
    return 'Welcome to Developments';
   })->name('develop.index');

   Route::get('/develop/{develops}', function($develops){ 
    if($develops === '5'){
      return redirect()->route('develop.index');
    }
    return 'Detalles del desarrollador' . $develops;
   });

   


// Route::get('/dashboard', function () {
//   //Ejecución del middleware, antes de devolver o mostrar una vista
//      return view('dashboard');
//      //Tambien se puede ejecutar despues de devolverlo mostrar una vista
//  })->middleware(['auth'])->name('dashboard');

 Route::middleware('auth')->group(function () {
   
    Route::view('/dashboard', 'dashboard')->name('dashboard'); //está es la ruta de arriba comentada pero simplificada

     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 });
//Ruta personalizada para lllamar la función de index y mostrar los posteos
 Route::get('/posts',[PostController::class, 'index'])-> name('posts.index');
 //Ruta personalizada para crear el registro en la BD de Posts.
 Route::post('/posts',[PostController::class, 'store'])-> name('posts.store');
//Ruta personalizada para crear el registro 
Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class,'edit'])->name('posts.edit');
//Ruta para update
Route::patch('/posts/{post}', [App\Http\Controllers\PostController::class,'update'])->name('posts.update');
//Ruta para eliminar
Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class,'destroy'])->name('posts.destroy');


require __DIR__.'/auth.php';
