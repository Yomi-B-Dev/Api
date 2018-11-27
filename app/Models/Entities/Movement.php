<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    public function leaderships()
    {
        return $this->hasMany('App\Models\Entities\Leadership');
    }

    public function tribes()
    {
        return $this->hasManyThrough('App\Models\Entities\Tribe', 'App\Models\Entities\Leadership');
    }

    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Movement_User',
            'movement_id', 'id', 'id', 'user_id');
    }
}
