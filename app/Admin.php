<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'job_title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_users');
    }
    
    
    public function hasAccess(array $permissions)
    {
       foreach($this->roles as $role){
            if($role->hasAccess($permissions)){
                return true;
            }
       }
       return false;
    }
    // public function inRole($roleSlug)
    // {
    //     return $this->roles()->where('slug',$roleSlug)->count()==1;
    // }
}
