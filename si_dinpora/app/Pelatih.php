<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    protected $fillable = [
        'nama', 'instansi_id', 'lomba_id', 'jenjang_id', 'cabor_id', 
    ];

    public function instansi()
    {
        return $this->belongsTo('App\Instansi', 'instansi_id');
    }
    public function lomba()
    {
        return $this->belongsTo('App\Lomba', 'lomba_id');
    }
    public function jenjang()
    {
        return $this->belongsTo('App\Jenjang', 'jenjang_id');
    }
    public function cabor()
    {
        return $this->belongsTo('App\Cabor', 'cabor_id');
    }
}