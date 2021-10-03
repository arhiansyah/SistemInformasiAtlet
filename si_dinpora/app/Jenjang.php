<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    public function sekolah()
    {
        return $this->hasMany('App\Sekolah');
    }
    
}