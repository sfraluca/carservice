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
                'publish-car' => true,
                'delete-car' => true,

                'create-admin' => true,
                'update-admin' => true,
                'view-admin' => true,
                'delete-admin' => true,
            ]),
        ]);
        
        $mechanic = Role::create([
            'name' => 'Mechanic',
            'slug'=> 'mechanic',
            'permissions' => json_encode([
                'create-car' => true,
                'update-car' => true,
                'publish-car' => true,
                'delete-car' => true,
            ]),
        ]);

        $receptionist = Role::create([
            'name' => 'Receptionist',
            'slug'=> 'receptionist',
            'permissions' => json_encode([
                'view-car' => true,
            ]),
        ]);
    }
}
