<?php

namespace App\Entities;

use App\Category;

class RegisterCategory
{

    public function registerCategory($params)
    {
        $category = Category::create([
            'title' => $params['title'],
        ]);
      
        return $category;
    }
}