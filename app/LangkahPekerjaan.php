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
}
