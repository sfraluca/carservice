<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarService extends Model
{
    protected $fillable = [
        'roles_id', 'title', 'price', 'description', 'service_date'
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
