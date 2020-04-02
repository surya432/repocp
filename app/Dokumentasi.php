<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokumentasi extends Model
{
    //
    use SoftDeletes;
    protected $table = 'dokumentasis';
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function imagesMedia()
    {
        return $this->hasMany('App\Media','dokumentasi_id','id');

    }
}