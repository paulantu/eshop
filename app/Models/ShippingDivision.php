<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDivision extends Model
{
    use HasFactory;

    protected $table = 'shipping_divisions';

    protected $fillable = [
        'division_name',
        'created_by',
        'status',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'created_by');
    }








}
