<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    
    /**
     * This table doesn't have timestamp
     */
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'crt_on',
        'updt_on',
    ];

}
