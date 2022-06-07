<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'billing_name',
        'billing_email',
         'billing_number',
          'type',
          'confirmed',
'coupon_id',
'details_address',
'billing_area',
'billing_restaurant',
'notes',
          'track_order',
          'delivery_date',
          'receive_date',
          'confirmation_date',

          'billing_discount_code',
          'billing_subtotal',
          'billing_total',
          'billing_tax',
    ];

    public function itemorder(){
        return $this->hasmany(orderitem::class,'order_id');
    }


    public function seller(){
        return $this->HasMany(seller_order::Class,'order_id');
    }
}
