<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
    use HasFactory;
}
