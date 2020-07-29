<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    protected $table = 'waktu';
    protected $guarded = [];

    public function langkahPekerjaan()
    {
        return $this->hasMany('App\LangkahPekerjaan');
    }
}
