<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primaryKey = "pk_product_id";
    public $timestamps = false;

    public function categoryDetail()
    {
    	return $this->belongsTo('App\CategoryDetail', 'fk_product_id', 'pk_category_detail_id');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category', 'App\CategoryDetail', 'fk_product_id', 'pk_category_detail_id', 'pk_category_id');
    }

}
