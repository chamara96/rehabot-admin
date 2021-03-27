<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['nic','reg_no','f_name','l_name','experience','address','contact_no','photo','user_id'];


}
