<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
       'price', 'description'
    ];

    public function category()
    {
         return $this->belongsTo(Category::class);
    }
    
    public function carService()
    {
         return $this->hasOne(CarService::class); 
    }
}
