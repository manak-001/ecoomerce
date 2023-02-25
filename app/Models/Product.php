<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='product';
    protected $guarded = ['id'];
     public function productcategory()
    {
        return $this->hasMany('App\Models\ProductAddon','product_id');
    }
}
