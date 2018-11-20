<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function tribe()
    {
        return $this->hasOne('App\Models\Entities\Tribe');
    }
}
