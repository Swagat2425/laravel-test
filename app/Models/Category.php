<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    /**
     * This table doesn't have timestamp
     */
    public $timestamps = false;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'status',
        'crt_on',
        'crt_by',
    ];
    
}
