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
        return $this->belongsToMany(Category::class);
    }

    public function car_service()
    {
        return $this->belongsToMany(CarService::class);
    }
}
