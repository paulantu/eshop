<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable =[
        'category',
        'sub_category',
        'brand',
        'title',
        'p_code',
        'discount',
        'selling_price',
        'buying_price',
        'description',
        '$thumbnail',
        'images',
        'status',
    ];

    public function Category(){
        return $this->hasOne(Category::class, 'id', 'category');
    }
    public function Subcategory(){
        return $this->hasOne(Subcategory::class, 'id', 'sub_category');
    }
    public function Brand(){
        return $this->hasOne(Category::class, 'id', 'brand');
    }

}
