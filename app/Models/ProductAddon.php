<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAddon extends Model
{
    use HasFactory;
    protected $table ='product_addon';
    protected $guarded = ['id'];
    public function category()
    {
        return $this->belongsTo('App\Models\Category','cate_id');
    }
}
