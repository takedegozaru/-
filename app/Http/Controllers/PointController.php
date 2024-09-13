<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
class PointController extends Controller

{
    public function create(Request $request, Point $point){
        // $point = new Point;
        
        // デフォルトのセットID
        $setId = $request->input('set_id', null);
        
        // 現在の得点数を取得
        $pointsCount = $setId ? Point::where('set_id', $setId)->count() : 0;
        $point_datas=$point->get();
        
        // ビューを返す
        return view('vball.create_point', [
            'pointsCount' => $pointsCount,
            'setId' => $setId,
            'points'=>$point_datas
        ]);
        
        
        
    }
    
    public function store(Request $request, Point $point)
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
            $input['school_id']=1;
            $input['reason_id']=1;
            $input['set_id']=1;
            $point->create($input);
        
        // return view('point.create_point')->with(['points'=>$point_datas]);
        
        return redirect('/point');
        
        // データを渡して同じ画面にリダイレクト
        // return redirect()->route('point.create', ['set_id' => $request->input('set_id')]);
    }
        
    
    
    public function sort(Request $request){
        
    }
    
   
}
