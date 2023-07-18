<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Models\Event;
use App\Http\Controllers\GamesController;
use App\Models\Category;
use App\Http\Controllers\CategoryController;

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

    

    Route::get('/games',[GamesController::class,'index'])->name('games');
    Route::get('/games/create',[GamesController::class,'create']);
    Route::post('/games/storegame',[GamesController::class,'store'])->name('createVideogame');
    Route::get('/games/view/{id_game}',[GamesController::class,'view'])->name('viewGame');
    Route::post('/games/updategame',[GamesController::class,'update'])->name('updateVideogame');
    Route::get('/games/delete/{id_game}',[GamesController::class,'delete'])->name('deleteGame');

    Route::resource('categories',CategoryController::class);

    Route::get('/grafica',function(){
        return view('grafica');
    });

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

