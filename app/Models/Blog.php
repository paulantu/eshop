<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
      'blog_cat_id',
        'title',
        'des_one',
        'des_two',
        'summary',
        'tag',
        'image'
    ];
}
