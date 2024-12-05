<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Set;
use App\Models\Point;
use App\Models\School;
use App\Models\Player;
use App\Models\User;

class GameController extends Controller
{
    public function game_log(Game $game, School $school)
    {
        $user_id=Auth::id();
        
        return view('vball.game_log')->with([
            'games'=>$games = Game::where('user_id',$user_id)->get(),
            'schools'=>$school->get()
            ]);
    }

    public function store_game(Request $request, Game $game, Set $set, Point $point)
    {
        $input=$request['game'];
        $input['my_score']=0;
        $input['op_score']=0;
        $input['user_id']=auth()->user()->id;
        $game->fill($input)->save();

        $set_input['game_id']=$game['id'];
        $set_input['set_number']=1;
        $set_input['my_points']=0;
        $set_input['op_points']=0;
        $set->fill($set_input)->save();
        
        $id=$game['id'];
        return redirect("/match/{$id}/point");
    }
    
    
    
    
    public function add_set(Request $request, Game $game, Set $set, Point $point)
    {
        //＝の時のバリデーションを作成する
        $max_set_number = $game->sets()->max('set_number');
        
        $max_set = $game->sets()->where('set_number', $max_set_number)->first();
        
        if($max_set['op_points'] >= $max_set['my_points']) {
            $game['op_score']=$game['op_score']+1;
        } else{
            $game['my_score']=$game['my_score']+1;
        }
        $game->save();
        
        
        $set_input['game_id']=$game['id'];
        $set_input['set_number']=$max_set_number+1;
        $set_input['my_points']=0;
        $set_input['op_points']=0;
        $set->fill($set_input)->save();
        $id=$game['id'];
        return redirect("/match/{$id}/point");
    }
    
}
    