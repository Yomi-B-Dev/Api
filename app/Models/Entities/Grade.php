<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function tribe()
    {
        return $this->hasOne('App\Models\Entities\Tribe');
    }

    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Grade_User',
            'grade_id', 'id', 'id', 'user_id');
    }
}
