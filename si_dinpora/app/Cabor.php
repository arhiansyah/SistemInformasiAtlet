<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabor extends Model
{
    protected $table = 'cabors';
    protected $fillable = ['cabor'];
    
    public function kelas_cabor()
    {
        return $this->hasMany('App\Kelas_cabor');
    }
    public function pelatih()
    {
        return $this->hasOne('App\Pelatih');
    }
}    