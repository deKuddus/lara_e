<?php

namespace App\model\product;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'tbl_products';


    public function category()
    {
    	 return $this->belongsTo('App\model\category\CatModel');
    }
    public function manufacturer()
    {
    	 return $this->belongsTo('App\model\manufacturer\ManufacturerModel');
    }
}
