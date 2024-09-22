<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Set;
use App\Models\Reason;
use App\Models\School;
use App\Models\Player;


class Point extends Model
{
     public $timestamps = false;
     protected $fillable = [  
          'set_id',
          'reason_id',
          'text',
          'school_id',
          'player_id',
          'point_number'
     ];
     
     public function school(){
          return $this->belongsTo(School::class);
     }
     public function reason(){
          return $this->belongsTo(Reason::class);
     }
     public function player(){
          return $this->belongsTo(Player::class);
     }
     public function set(){
          return $this->belongsTo(Set::class);
     }
    
    use HasFactory;
}
