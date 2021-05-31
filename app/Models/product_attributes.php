<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_attributes extends Model
{
    use HasFactory;

    protected $table = 'product_attributes';
    protected $fillable = [
    'product_id',
        'size',
        'sku',
        'qty'
    ];

    public function Product(){
            return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function Products(){
        return $this->belongsTo(Product::class);
    }
}
