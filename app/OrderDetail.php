<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "tbl_order_detail";
    public $timestamps = false;

    public function order()
    {
    	return $this->belongsTo('App\Order', 'order_id', 'order_id');
    }

}
