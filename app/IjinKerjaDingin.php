<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IjinKerjaDingin extends Model
{
    protected $table = 'ijin_kerja_dingin';
    protected $guarded = [];

    public function jsa()
    {
        return $this->belongsTo('App\Jsa');
    }

    public function umum()
    {
        return $this->belongsTo('App\Umum');
    }

    public function sumberBahayaAlat()
    {
        return $this->belongsTo('App\SumberBahayaAlat');
    }

    public function alatPelindungDiri()
    {
        return $this->belongsTo('App\AlatPelindungDiri');
    }

    public function dokumenPendukung()
    {
        return $this->belongsTo('App\DokumenPendukung');
    }

    public function pengesahan()
    {
        return $this->belongsTo('App\Pengesahan');
    }

    public function validasi()
    {
        return $this->hasMany('App\Validasi');
    }
}
