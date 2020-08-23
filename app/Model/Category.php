<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories() {
        return $this->hasMany('App\Model\Subcategory');
    }
}
