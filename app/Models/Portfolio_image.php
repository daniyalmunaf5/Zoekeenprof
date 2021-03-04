<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio_image extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'filename'];

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
