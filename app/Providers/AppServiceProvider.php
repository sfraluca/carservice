<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function registerAdminPolicies()
    {
        //ADMIN
        Gate::define('create-admin',function($admin){
           return $admin->hasAccess(['create-admin']);
        });
        Gate::define('update-admin',function($admin, \App\Admin $admins){
           return $admin->hasAccess(['update-admin']) or $admin->id == $admins->admin_id;
        });
        Gate::define('view-admin',function($admin){
           return $admin->hasAccess(['view-admin']);
        });
        Gate::define('see-all-admins',function($admin){
           return $admin->inRole(['mechanic']);
        });
        
        //Car
        Gate::define('create-car',function($car){
            return $car->hasAccess(['create-car']);
         });
        //  Gate::define('update-admin',function($admin, \App\Admin $admins){
        //     return $admin->hasAccess(['update-admin']) or $admin->id == $admins->admin_id;
        //  });
         Gate::define('view-car',function($car){
            return $car->hasAccess(['view-car']);
         });
        //  Gate::define('see-all-admins',function($admin){
        //     return $admin->inRole(['mechanic']);
        //  });


    }
}
