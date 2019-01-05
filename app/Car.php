<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class Car extends Model
{
    protected $guard = 'admin';

    protected $fillable = [
        'plate_number', 'brand', 'model', 'year', 'color','fuel_type', 'motor','injection_type','motor_code','car_body','user_id'
    ];

    public function services()
    {
         return $this->hasMany(CarService::class); 
    }
  
}
