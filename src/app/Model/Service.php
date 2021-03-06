<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'services';

    protected $fillable = [
        'title', 'owner', 'description', 'state',
        'wait_at', 'process_at', 'done_at'
    ];

    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function division() {
        return $this->belongsTo('App\Model\Division');
    }
}
