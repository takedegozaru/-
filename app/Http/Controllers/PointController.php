<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Set;
use App\Http\Controllers\GameController;
use App\Models\Game;
use App\Models\Reason;

class PointController extends Controller
{
    public function create(Request $request, Point $point, Game $game, Reason $reason){
        // ビューを返す
        return view('vball.create_point', [
            'reasons'=>$reason->get(),
            'game'=>$game
        ]);
        
        
        
    }
    
    public function store(Request $request, Point $point, Set $set)
    {
        // // バリデーション
        // $request->validate([
        //     'reason_id' => 'required|exists:reasons,id',
        //     'text' => 'nullable|string',
        //     'set_id' => 'nullable|exists:sets,id',
        //     'school_id' => 'nullable|exists:schools,id',
        //     'player_id' => 'nullable|exists:players,id',
        // ]);


        // dd($request);
        
        // $now_point=$point['point_number'];
       
        
        $input=$request['point'];
        $input['school_id']=$set->game->school_id;
        $input['set_id']=$set['id'];
        $point->create($input);
        
        $set->my_points=$set->my_points+1;
        $set->save();
        
        
        
        return redirect("/match/{$set->game->id}/point");
        
        // データを渡して同じ画面にリダイレクト
        // return redirect()->route('point.create', ['set_id' => $request->input('set_id')]);
    }
    
}
