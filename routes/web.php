<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Models\Event;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/events', function(){
    
        $events = Event::all();

        $heads = [
            'ID',
            'Nombre',
            'Descripción',
            'Estatus',
            'Tipo',
            'Fecha'
        ];
    
        return view('events',compact('events','heads'));
    });
    
    
    Route::get('/events/create', [EventsController::class,'create']);
    
    Route::get('/games',function(){ 
        return "Bienvenido a la web que listara los objetos comprados";
    });
    
    Route::get('/games/create',function(){
        return "Pagina que creara el formulario para dar de alta juegos";
    });

    Route::get('/games/{name_game}/{categoria}',function($game_name,$category_game){ 
        return "Bienvenido a la pagina del juego: ".$game_name." pertenece a la categoria ".$category_game;
    });


});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

