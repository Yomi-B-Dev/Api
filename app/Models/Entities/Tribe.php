<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Tribe extends Model
{
    public function leadership()
    {
        return $this->belongsTo('App\Models\Entities\Leadership');
    }

    public function grades()
    {
        return $this->hasMany('App\Models\Entities\Grade');
    }
}
