<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\Player;

class SchoolController extends Controller
{
    public function create_school(School $school){
        
        $user_id=Auth::id();
        return view('vball.create_school')->with([
            'schools'=>$school = School::where('user_id',$user_id)->get(),
            ]);
        
         }
    
    public function school_setting(Request $request,  School $school, Player $player){
        $input=$request['school'];
        $input['user_id']=auth()->user()->id;
        $school->fill($input)->save();
        $id=$school['id'];
        
        if($request['auto_member']){
            $players=[];
            for($i=1;$i<=10;$i++){
                $players[]=['number'=>$i, 'school_id'=>$id];
            }
            
            Player::insert($players);
        }
        return redirect("/school/{$id}/member");
    }
    
    public function member_create(Request $request, School $school, Player $player){
        $input=$request['player'];
        $input['school_id']=$school['id'];
        $player->fill($input)->save();
        return redirect("/school/{$player['school']['id']}/member");
    }
    public function member(School $school){
        return view("vball.member")->with(['school'=>$school]);
    }
    
    public function member_name(Request $request, Player $player){
        $input=$request['player'];
        $player->fill($input)->save();
        
        return redirect("/school/{$player['school']['id']}/member");
    }
}
