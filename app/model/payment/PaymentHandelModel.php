<?php

namespace App\model\payment;

use Illuminate\Database\Eloquent\Model;

class PaymentHandelModel extends Model
{
    protected $table = 'tbl_payment';
    protected $fillable = ['payment_method'];
}
