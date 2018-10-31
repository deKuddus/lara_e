<?php

namespace App\model\shipping;

use Illuminate\Database\Eloquent\Model;

class ShippingModel extends Model
{
    protected $table = 'tbl_shipping';

    protected $fillable = ['customer_fname','customer_lname','customer_email','customer_phone','customer_address1','customer_city'];
}
