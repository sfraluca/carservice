<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'roles_id', 'title'
    ];

    public function products()
    {
         return $this->hasMany(Product::class); 
    }
}
