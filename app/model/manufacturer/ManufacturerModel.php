<?php

namespace App\model\manufacturer;

use Illuminate\Database\Eloquent\Model;

class ManufacturerModel extends Model
{
    protected $fillable = ['manufacturer_name','manufacturer_description'];

    protected $table ='tbl_manufacturers';
}
