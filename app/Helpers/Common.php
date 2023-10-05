<?php

namespace App\Helpers;

use App\Models\Category;

class Common
{

    public static function cmn_get_categories() {

        $categories = Category::select('name')->where('status', 1)->get();
    
        return $categories;
        
    }

}