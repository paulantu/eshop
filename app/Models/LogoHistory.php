<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogoHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'logo',
        'status'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'uploaded_by');
    }
}
