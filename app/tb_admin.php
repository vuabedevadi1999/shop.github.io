<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_admin extends Model
{
    //
    protected $fillable = [
        'admin_email', 'admin_password', 'admin_name','admin_phone',
    ];
}
