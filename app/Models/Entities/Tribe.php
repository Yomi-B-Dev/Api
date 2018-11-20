<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Tribe extends Model
{
    public function leadership()
    {
        return $this->hasOne('App\Models\Entities\Leadership');
    }
}
