<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    public function jenjang()
    {
        return $this->belongsTo('App\Jenjang');
    }
}