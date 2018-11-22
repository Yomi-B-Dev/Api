<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    public $timestamps = false;

    protected $table = 'posts_images';

    public function post()
    {
        return $this->belongsTo('App\Models\Entities\Post');
    }
}
