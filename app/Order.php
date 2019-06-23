<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "tbl_order";
    protected $primaryKey = "order_id";
    public $timestamps = false;

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'customer_id', 'pk_customer_id');
    }

    public function orderDetail()
    {
    	return $this->hasMany('App\OrderDetail', 'order_id', 'order_id');
    }
}
