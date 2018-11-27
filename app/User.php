<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'gov_id'
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Entities\Post');
    }

    public function movement()
    {
        return $this->belongsTo('App\Models\Entities\Movement');
    }

    public function leadership()
    {
        return $this->belongsTo('App\Models\Entities\Leadership');
    }

    public function tribe()
    {
        return $this->belongsTo('App\Models\Entities\Tribe');
    }

    public function grade()
    {
        return $this->belongsTo('App\Models\Entities\Grade');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
