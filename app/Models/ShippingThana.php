<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingThana extends Model
{
    use HasFactory;


    protected $table = 'shipping_thanas';

    protected $fillable = [
        'division_id',
        'district_id',
        'thana_name',
        'created_by',
        'status',
    ];


    public function user(){
        return $this->hasOne(User::class, 'id', 'created_by');
    }
    public function Divisions(){
        return $this->hasOne(ShippingDivision::class,'id', 'division_id');
    }
    public function Districts(){
        return $this->hasOne(ShippingDistrict::class,'id', 'district_id');
    }







}
