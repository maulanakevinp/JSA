<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jsa extends Model
{
    protected $table = 'jsa';
    protected $guarded = [];

    public function pengaju()
    {
        return $this->belongsTo('App\User', 'pengaju_id');
    }

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
        return $this->hasOne('App\IjinKerjaPanas');
    }
}
