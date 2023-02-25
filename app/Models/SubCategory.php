<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table ='sub_category';
    protected $guarded = ['id'];
    public function category()
    {
        return $this->belongsTo('App\Models\Category','cate_id');
    }
}
