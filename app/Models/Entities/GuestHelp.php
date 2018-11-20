<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class GuestHelp extends Model
{
    protected $table = 'user_help';
    protected $fillable = ['question', 'answer'];
}
