<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    protected $table = 'atlets';
    protected $fillable = ['lomba_id', 'nama', 'sekolah_id', 'cabor_id', 'kelas_cabor_id', 'tahun_id',  'prestasi_id'];
    public function sekolah()
    {
        return $this->belongsTo('App\Sekolah');
    }
    public function cabor()
    {
        return $this->belongsTo('App\Cabor');
    }
    public function kelas_cabor()
    {
        return $this->belongsTo('App\Kelas_cabor');
    }
    public function lomba()
    {
        return $this->belongsTo('App\Lomba');
    }
    public function tahun()
    {
        return $this->belongsTo('App\Tahun');
    }
    public function prestasi()
    {
        return $this->belongsTo('App\Prestasi');
    }
}