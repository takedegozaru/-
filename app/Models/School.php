<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class School extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [  
        'name'
    ];
     
    public function games()
    {
        return $this->hasmany(Game::class);
    }
}
