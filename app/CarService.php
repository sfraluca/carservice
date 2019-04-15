<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarService extends Model
{
    protected $fillable = [
        'title', 'price', 'description', 'service_date','state'
    ];

    public function cars()
    {
         return $this->belongsTo('App\Car');
    }

    public function products()
    {
         return $this->belongsTo(Product::class);
    }
}
