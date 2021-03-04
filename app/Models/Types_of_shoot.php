<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types_of_shoot extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'types_of_shoots'];

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
