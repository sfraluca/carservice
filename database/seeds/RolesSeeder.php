<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin',
            'slug'=> 'admin',
            'permissions' => json_encode([
                'create-car' => true,
                'update-car' => true,
                'delete-car' => true,

                'create-admin' => true,
                'update-admin' => true,
                'delete-admin' => true,

                'create-user' => true,
                'update-user' => true,
                'delete-user' => true,

                'create-car-service' => true,
                'update-car-service' => true,
                'delete-car-service' => true,

                'create-category' => true,
                'update-category' => true,
                'delete-category' => true,

                'create-product' => true,
                'update-product' => true,
                'delete-product' => true,

            ]),
        ]);
        
        $mechanic = Role::create([
            'name' => 'Mechanic',
            'slug'=> 'mechanic',
            'permissions' => json_encode([
                'create-car' => true,
                'update-car' => true,
                'delete-car' => true,

                'create-car-service' => true,
                'update-car-service' => true,
                'delete-car-service' => true,

                'create-category' => true,
                'update-category' => true,
                'delete-category' => true,

                'create-product' => true,
                'update-product' => true,
                'delete-product' => true,
            ]),
        ]);

        $receptionist = Role::create([
            'name' => 'Receptionist',
            'slug'=> 'receptionist',
            'permissions' => json_encode([
                'create-car' => true,

                'create-user' => true,
                'update-user' => true,
                'delete-user' => true,
            ]),
        ]);
    }
}
