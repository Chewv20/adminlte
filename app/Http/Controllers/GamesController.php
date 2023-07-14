<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index(){
        return "Bienvenido a la web que listara los objetos comprados";
    }

    public function create(){
        return "Pagina que creara el formulario para dar de alta juegos";
    }

    public function help($name_game,$categoria=null){
        if ($categoria) {
            return "Bienvenido a la pagina del juego: ".$name_game." pertenece a la categoria ".$categoria;
        }else{
            return "Bienvenido a la pagina del juego: ".$name_game;
        }  
    }
}
