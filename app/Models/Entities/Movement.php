<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    public function leaderships()
    {
        return $this->hasMany('App\Models\Entities\Leadership');
    }
}
