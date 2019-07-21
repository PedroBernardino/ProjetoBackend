<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pucharse extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Post');
    }
    
    public function products()
    {
        return $this->belongsToMany('App\User');
    }
}
