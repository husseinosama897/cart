<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class category extends Model
{
    use HasFactory, Sluggable;



    public function product(){
        return $this->HasMany(product::class,'category_id');
    }


protected $fillable = [
    'slug', 'name', 'image',
];
public $timestamps = false;
    public function sluggable(): array
    {



        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


}
