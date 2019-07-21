<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function pucharses()
    {
        return $this->hasMany('App\Pucharse');
    }
}
