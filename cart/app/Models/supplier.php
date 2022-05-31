<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class supplier extends Model
{



protected $fillable = [
    'image',
    'slug',
  'comp',
      'postal_code',
      'building_num',
      'street_name',
  'tax_number',
  'country',

  'phone',
  'location',
  'city',
  'email',
];

    use HasFactory , Sluggable;
    protected $table = 'suppliers';
    public function product(){
        return $this->HasMany(product::class,'supplier_id');
    }


    public function category(){
     return $this->belongsToMany(category::class,'category_supplier');
    }

    public function sluggable(): array
    {



        return [
            'slug' => [
                'source' => 'comp'
            ]
        ];
    }


}
