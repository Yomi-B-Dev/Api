<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class PostLink extends Model
{
    public $timestamps = false;

    protected $table = 'posts_links';

    public function post()
    {
        return $this->belongsTo('App\Models\Entities\Post');
    }
}
