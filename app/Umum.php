<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umum extends Model
{
    protected $table = 'umum';
    protected $guarded = [];

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
