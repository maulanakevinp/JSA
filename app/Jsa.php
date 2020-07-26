<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jsa extends Model
{
    protected $table = 'jsa';
    protected $guarded = [];

    public function pereview()
    {
        return $this->belongsTo('App\User', 'pereview_id');
    }

    public function penyetuju()
    {
        return $this->belongsTo('App\User', 'penyetuju_id');
    }

    public function langkahPekerjaan()
    {
        return $this->hasMany('App\LangkahPekerjaan');
    }

    public function ijinKerjaPanas()
    {
        return $this->hasMany('App\IjinKerjaPanas');
    }

    public function ijinKerjaGalian()
    {
        return $this->hasMany('App\IjinKerjaGalian');
    }

    public function ijinKerjaListrik()
    {
        return $this->hasMany('App\IjinKerjaListrik');
    }

    public function ijinKerjaRadiografi()
    {
        return $this->hasMany('App\IjinKerjaRadiografi');
    }

    public function ijinKerjaDiKetinggian()
    {
        return $this->hasMany('App\IjinKerjaDiKetinggian');
    }

    public function ijinKerjaRuangTerbatas()
    {
        return $this->hasMany('App\IjinKerjaRuangTerbatas');
    }
}
