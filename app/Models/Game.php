<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\School;
use App\Models\Set;
use App\Models\User;
class Game extends Model
{
    use HasFactory;
    
    protected $fillable = [  
        'id',
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
    public function user(){
          return $this->belongsTo(User::class);
     }
     public function sets(){
          return $this->hasMany(Set::class);
     }
     
}