<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class GuestHelp extends Model
{
    protected $table = 'guest_help';
    protected $fillable = ['question', 'answer'];
}
