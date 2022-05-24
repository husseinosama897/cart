<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    public function product(){
        return $this->HasMany(product::class,'supplier_id');
    }


    public function category(){
        BelongsTOmany(category::class,'category_id');
    }
}
