<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'name',
        'point_id'
        ];
    
    public function reasons(){
        return $this->hasMany(Reason::class);
     }    
}