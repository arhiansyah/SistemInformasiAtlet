<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    public function pelatih()
    {
        return $this->belongsTo('App\Pelatih');
    }
}