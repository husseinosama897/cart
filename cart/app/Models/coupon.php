<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    public static function findByCode($code)
    {
        $couponDetails = Coupon::where('code',$code)->first();
    }
    public function discount($total)
    {
        if ($this->type == 'voucher') {
            return $this->value ;
        } elseif ($this->type == 'percent') {
            return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }

    }



    public function order(){

        return $this->HasMany(order::class,'order_id');
    }


    public function item(){

        return $this->belongsTo(item::class,'item_id');
    }



}
