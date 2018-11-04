<?php

namespace App\Entities;

use App\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterAdmin
{

    public function register($params)
    {
        $admin = Admin::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'job_title' => $params['job_title'],
            'password' => Hash::make($params['password']),
        ]);
        
        $admin->roles()->attach($params['role']);

        return $admin;
    }
}