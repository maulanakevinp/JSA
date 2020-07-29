<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PicPelaksana extends Model
{
    protected $table = 'pic_pelaksana';
    protected $guarded = [];

    public function langkahPekerjaan()
    {
        return $this->hasMany('App\LangkahPekerjaan');
    }
}
