<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function game_log(Game $game)
    {
        
        return view('vball.game_log')->with(['games'=>$game->get()]);
    }
}
