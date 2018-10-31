<?php

namespace App\model\order;

use Illuminate\Database\Eloquent\Model;

class OrderHandellingModel extends Model
{
    protected $table='tbl_order';

    protected $fillable = ['payment_id','shipping_id','customer_name','total_order', 'product_quantity'];

}
