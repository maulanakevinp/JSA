<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LangkahPekerjaan extends Model
{
    protected $table = 'langkah_pekerjaan';
    protected $guarded = [];

    public function jsa()
    {
        return $this->belongsTo('App\Jsa');
    }

    public function potensiBahaya()
    {
        return $this->hasMany('App\PotensiBahaya');
    }

    public function bahayaSpesifik()
    {
        return $this->hasMany('App\BahayaSpesifik');
    }

    public function picPelaksana()
    {
        return $this->hasMany('App\PicPelaksana');
    }

    public function rencanaTindakanPencegahan()
    {
        return $this->hasMany('App\RencanaTindakanPencegahan');
    }

    public function waktu()
    {
        return $this->hasMany('App\Waktu');
    }
}
