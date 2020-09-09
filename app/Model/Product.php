<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function prdPrice()
    {
    	return $this->hasOne('App\Model\Prdprice');
    }
    public function prdPosition()
    {
    	return $this->hasOne('App\Model\Prdposition');
    }
}
