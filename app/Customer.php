<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    protected $primaryKey = "pk_customer_id";
    public $timestamps = false;

    public function order()
    {
    	return $this->hasOne('App\Order', 'customer_id', 'pk_customer_id');
    }

    public function orderDetail()
    {
    	return $this->hasManyThrough('App\OrderDetail', 'App\Order', 'customer_id', 'order_id', 'pk_customer_id');
    }
}
