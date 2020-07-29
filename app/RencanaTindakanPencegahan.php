<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencanaTindakanPencegahan extends Model
{
    protected $table = 'rencana_tindakan_pencegahan';
    protected $guarded = [];

    public function langkahPekerjaan()
    {
        return $this->hasMany('App\LangkahPekerjaan');
    }
}
