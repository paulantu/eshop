<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'category_id', 'name',
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function Categorymenu(){
        return $this->belongsTo('App\Models\Category');
    }
}
