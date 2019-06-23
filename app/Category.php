<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $primaryKey = "pk_category_id";
    public $timestamps = false;

    public function categoryDetail()
    {
    	return $this->hasMany('App\CategoryDetail', 'fk_category_detail_id', 'pk_category_id');
    }

    public function product()
    {
    	return $this->hasManyThrough('App\Product', 'App\CategoryDetail', 'fk_category_detail_id', 'fk_product_id', 'pk_category_id');
    }

}
