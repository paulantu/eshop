<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDistrict extends Model
{
    use HasFactory;

    protected $table = 'shipping_districts';

    protected $fillable = [
        'division_id',
        'district_name',
        'created_by',
        'status',
    ];


    public function user(){
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function Districts(){
        return $this->hasOne(ShippingDivision::class,'id', 'division_id');
    }






}
