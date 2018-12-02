<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
     'roles_id','price', 'description'
    ];

    public function category()
    {
         return $this->belongsTo(Category::class);
    }
    
    public function services()
    {
         return $this->hasOne(CarService::class); 
    }
}
