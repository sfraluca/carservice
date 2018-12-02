<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerCarPolicies();
        $this->registerCategoryPolicies();
        $this->registerProductPolicies();
        $this->registerCarServicePolicies();
        $this->registerAdminPolicies();
        //
    }
    public function registerAdminPolicies()
    {
        //Admin
        Gate::define('create-admin',function($admin){
            return $admin->hasAccess(['create-admin']);
        });
        Gate::define('update-admin',function($admin, \App\Admin $admins){
            return $admin->hasAccess(['update-admin']) or $admin->id == $admins->admin_id;
        });
        Gate::define('delete-admin',function($admin){
            return $admin->hasAccess(['delete-admin']);
        });
    }
    public function registerCarPolicies()
    {
        //Car
        Gate::define('create-car',function($admin){
            // return $admin->hasAccess(['create-car']);
            return true;
        });
        Gate::define('update-car',function($admin, \App\Car $car){
            return $admin->hasAccess(['update-car']) or $admin->id == $car->admin_id;
        });
        Gate::define('delete-car',function($admin){
            return $admin->hasAccess(['delete-car']);
        });
    }

    public function registerCarServicePolicies()
    {
        //CarService
        Gate::define('create-car-service',function($admin){
            return $admin->hasAccess(['create-car-service']);
        });
        Gate::define('update-car-service',function($admin, \App\CarService $carservice){
            return $admin->hasAccess(['update-car-service']) or $admin->id == $carservice->admin_id;
        });
        Gate::define('delete-car',function($admin){
            return $admin->hasAccess(['delete-car-service']);
        });
    }

    public function registerCategoryPolicies()
    {
        //Category
        Gate::define('create-category',function($admin){
            return $admin->hasAccess(['create-category']);
        });
        Gate::define('update-category',function($admin, \App\Category $category){
            return $admin->hasAccess(['update-category']) or $admin->id == $category->admin_id;
        });
        Gate::define('delete-category',function($admin){
            return $admin->hasAccess(['delete-category']);
        });
    }

    public function registerProductPolicies()
    {
        //Product
        Gate::define('create-product',function($admin){
            return $admin->hasAccess(['create-product']);
        });
        Gate::define('update-product',function($admin, \App\Product $product){
            return $admin->hasAccess(['update-product']) or $admin->id == $product->admin_id;
        });
        Gate::define('delete-product',function($admin){
            return $admin->hasAccess(['delete-product']);
        });
    }
}
