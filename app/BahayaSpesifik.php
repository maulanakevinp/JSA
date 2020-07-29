<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BahayaSpesifik extends Model
{
    protected $table = 'bahaya_spesifik';
    protected $guarded = [];

    public function langkahPekerjaan()
    {
        return $this->hasMany('App\LangkahPekerjaan');
    }
}
