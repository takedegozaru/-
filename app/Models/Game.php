<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;

class Game extends Model
{
    use HasFactory;
    
    protected $fillable = [  
        'user_id',
        'school_id',
        'name',
        'my_score',
        'op_score',
        'date',
        'created_at',
        'updated_at'
     ];
     
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
