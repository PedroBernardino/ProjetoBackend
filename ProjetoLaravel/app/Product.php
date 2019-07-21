<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function pucharses()
    {
        return$this->belongsToMany('App\Pucharse');
    }
}
