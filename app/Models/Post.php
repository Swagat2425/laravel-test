<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    /**
     * This table doesn't have timestamp
     */
    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
        'image',
        'cat_id',
        'status',
        'crt_on',
        'updt_on',
        'crt_by',
        'udpt_by',
    ];

}
