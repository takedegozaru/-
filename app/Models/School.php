<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
use App\Models\Player;
use App\Models\User;


class School extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [  
        'user_id',
        'name'
    ];
     
    public function games()
    {
        return $this->hasmany(Game::class);
    }
    public function players(){
        return $this->hasmany(Player::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}