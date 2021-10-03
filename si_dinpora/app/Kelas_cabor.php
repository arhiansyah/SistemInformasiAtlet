<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas_cabor extends Model
{
    protected $fillable = [
        'cabor_id','kelas'
    ];

    public function cabor()
    {
        return $this->belongsTo('App\Cabor');
    }
    public function pelatih()
    {
        return $this->belongsTo('App\Pelatih');
    }
}