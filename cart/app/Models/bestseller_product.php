<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bestseller_product extends Model
{

    protected $fillable = [
        'profit',
        'number_of_sales',
  
    ];
    use HasFactory;
}
