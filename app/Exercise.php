<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name', 's_max', 's_min', 'e_max', 'e_min'];
}
