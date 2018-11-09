<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarService extends Model
{
    protected $fillable = [
        'title', 'price', 'description', 'service_date'
    ];

    public function cars()
    {
         return $this->belongsTo(Car::class);
    }

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class);
    // }
}
