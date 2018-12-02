<?php

namespace App\Entities;

use App\Car;
use App\Image;
use Illuminate\Support\Facades\Hash;
use Auth;
class RegisterCar
{
    protected $image;
    public function __construct()
    {
        $this->image = app(Image::class);
    }
    public function registerCar($params)
    {
        $car = Car::create([
            'plate_number' => $params['plate_number'],
            'brand' => $params['brand'],
            'model' => $params['model'],
            'year' => $params['year'],
            'color' => $params['color'],
            'fuel_type' => $params['fuel_type'],
            'motor' => $params['motor'],
            'injection_type' => $params['injection_type'],
            'motor_code' => $params['motor_code'],
            'car_body' => $params['car_body'],
            'user_id' => $params['user_id']
        ]);
        
        return $car;
    }

    

}