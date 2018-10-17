<?php

namespace App\model\category;

use Illuminate\Database\Eloquent\Model;

class CatModel extends Model
{
    protected $fillable=['category_name','category_description'];

    protected $table ='tbl_categories';
}
