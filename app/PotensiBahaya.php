<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PotensiBahaya extends Model
{
    protected $table = 'potensi_bahaya';
    protected $guarded = [];

    public function langkahPekerjaan()
    {
        return $this->hasMany('App\LangkahPekerjaan');
    }
}
