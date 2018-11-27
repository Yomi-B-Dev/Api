<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
    public function movement()
    {
        return $this->belongsTo('App\Models\Entities\Movement');
    }

    public function tribes()
    {
        return $this->hasMany('App\Models\Entities\Tribe');
    }

    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Leadership_User',
            'leadership_id', 'id', 'id', 'user_id');
    }
}
