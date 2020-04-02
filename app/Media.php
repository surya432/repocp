<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $fillable = [
        'title', 'path', 'dokumentasi_id', 'mime',
    ];
    public function dokumentasi()
    {
        return $this->belongsTo('App\Dokumentasi');
    }
}
