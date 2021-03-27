<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['nic','dof','f_name','l_name','address','contact_no','photo','user_id'];
}
