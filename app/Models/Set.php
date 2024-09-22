<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Point;
class Set extends Model
{
    use HasFactory;
        
    public $timestamps = false;
    protected $fillable =[
        'id',
        'game_id',
        'set_number',
        'my_points',
        'op_points'
    ];
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
      public function points()
    {
        return $this->hasMany(Point::class);
    }
}
