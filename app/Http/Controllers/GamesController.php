<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GamesController extends Controller
{
    public function index(){
        //return "Bienvenido a la web que listara los objetos comprados";
        $games_array = array('Fifa 22', 'NBA 22', 'Mario Kart', 'Super Mario');
        
        return view('games',['games'=>$games_array]);
    }

    public function create(){
        return view('games-create');
    }

    public function help($name_game,$categoria=null){
        
        return view('games-show',['name'=>$name_game,'category'=>$categoria]);
        
        /*if ($categoria) {
            return "Bienvenido a la pagina del juego: ".$name_game." pertenece a la categoria ".$categoria;
        }else{
            return "Bienvenido a la pagina del juego: ".$name_game;
        }  */
    }
}
