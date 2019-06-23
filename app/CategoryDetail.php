<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
    protected $table = "category_detail";
    protected $primaryKey = "pk_category_detail_id";
    public $timestamps = false;

    public function category()
    {
    	return $this->belongsTo('App\Category', 'fk_category_detail_id', 'pk_category_id');
    }

    public function product()
    {
    	return $this->hasMany('App\Product', 'fk_product_id', 'pk_category_detail_id');
    }

}
