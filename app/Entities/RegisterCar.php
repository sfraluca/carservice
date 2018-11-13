<?php

namespace App\Entities;

use App\Car;
use App\Image;
use Illuminate\Support\Facades\Hash;
class RegisterCar
{

    public function registerCar($params)
    {
        $car = Car::create([
            'plate_number' => $params['plate_number'],
            'brand' => $params['brand'],
            'model' => $params['model'],
            'year' => $params['year'],
            'color' => $params['color'],
            'KW' => $params['KW'],
            'CP' => $params['CP'],
            'car_body' => $params['car_body'],
            'motor' => $params['motor'],
        ]);
        
        return $car;
    }

    public function upload($params)
    {
        $image = Image::create([
            'image' => Hash::make($params['image']),
        ]);
        
        return $image;
    }
}