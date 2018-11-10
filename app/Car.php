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
        'plate_number', 'brand', 'model', 'year', 'color', 'KW','CP','car_body','motor'
    ];

    public function services()
    {
         return $this->hasMany(CarService::class); 
    }

    // public function car_service()
    // {
    //     return $this->belongsToMany(CarService::class);
    // }

    // public function hasAccess(array $permission){
    //     foreach($this->roles as $role){
    //         if($role->hasAccess($permission)){
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    // public function inRole($roleSlug)
    // {
    //     return $this->roles()->where('slug',$roleSlug)->count()==1;
    // }
  
}
