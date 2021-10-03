<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    public function pelatih()
    {
        return $this->hasOne('App\Pelatih');
    }
}