<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id','state_id', 'name', 'status'
    ];
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public static function getCities($state)
    {
        $result = City::where('state_id','=',$state)->orderby('name','asc')->get();
        return $result;
    }
}
