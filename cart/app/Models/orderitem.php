<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'seller_order_id',
    'user_id',
      'type',
       'image',
        'status',
      'amount',
        'quantity',
    ];

    public function product(){
      return $this->belongsto(product::class,'product_id');
    }
}
