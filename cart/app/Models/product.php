<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class product extends Model
{

    protected $fillable = [
        'name',
        'price',
      'qty_type',
      'image',
          'qty',
       'discount',
        'offer',
      'category_id',
      'supplier_id',
    ];
    
    use HasFactory , Sluggable;
    public function sluggable(): array
    {



        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
