<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    protected $table = 'divisions';

    protected $fillable = [
        'name'
    ];

    public function services() {
        return $this->hasMany('App\Model\Service');
    }
}
