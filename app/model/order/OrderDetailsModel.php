<?php

namespace App\model\order;

use Illuminate\Database\Eloquent\Model;

class OrderDetailsModel extends Model
{
        protected $table='tbl_orderDetails';

    protected $fillable = ['order_id','product_id','product_name','product_price', 'product_quantity','customer_name'];
}
