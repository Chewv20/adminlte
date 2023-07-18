<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Videogame;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class GamesController extends Controller
{
    public function index(){
        //return "Bienvenido a la web que listara los objetos comprados";
        //$games_array = array('Fifa 22', 'NBA 22', 'Mario Kart', 'Super Mario');
        //$games_array = array();
        $videogame = Videogame::all();
        //return view('events',compact('events','heads'));
        $heads = [
            'ID',
            'Nombre',
            'Descripción ID',
            'Creado',
            'Estado',
            'Acciones'
        ];
        return view('games',compact('videogame','heads'));
    }

    public function create(){
        $categorias = Category::all();
        return view('games-create',['categorias'=>$categorias]);
    }

    public function help($name_game,$categoria=null){
        
        return view('games-show',['name'=>$name_game,'category'=>$categoria]);
        
        /*if ($categoria) {
            return "Bienvenido a la pagina del juego: ".$name_game." pertenece a la categoria ".$categoria;
        }else{
            return "Bienvenido a la pagina del juego: ".$name_game;
        }  */
    }

    public function store(Request $request){
        $game = new Videogame;
        $game -> name = $request ->name_game;
        $game -> category_id = $request ->categoria_id;
        $game -> save();

        return redirect()-> route('games');
    }

    public function view($id_game){
        $game = Videogame::find($id_game);
        $categorias = Category::all();
        return view('games-update',['categorias'=>$categorias,'game'=>$game]);
    }

    public function update(Request $request){

        $game = Videogame::find($request->game_id);
        $game -> name = $request ->name_game;
        $game -> category_id = $request ->categoria_id;
        $game -> save();

        return redirect()-> route('games');
    }

    public function delete($id_game){
        $game = Videogame::find($id_game);
        $game -> delete();
        return redirect()-> route('games');
    }

}
