<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Car;
use App\Admin;
use App\CarService;
use App\Category;
use App\Product;
use App\Role;

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
        $this->registerAdminPolicies();
        $this->registerUserPolicies();
        $this->registerCarPolicies();
        $this->registerCarServicePolicies();
        $this->registerCategoryPolicies();
        $this->registerProductPolicies();
        
    }
    public function registerAdminPolicies()
    {
        //Admin
        Gate::define('create-admin',function($admin){
            return $admin->hasAccess(['create-admin']);
        });
        Gate::define('update-admin',function($admin){
            return $admin->hasAccess(['update-admin']);
        });
        Gate::define('delete-admin',function($admin){
            return $admin->hasAccess(['delete-admin']);
        });
    }

    public function registerUserPolicies()
    {
        //User
        Gate::define('create-user',function($admin){
            return $admin->hasAccess(['create-user']);
        });
        Gate::define('update-user',function($admin){
            return $admin->hasAccess(['update-user']);
        });
        Gate::define('delete-user',function($admin){
            return $admin->hasAccess(['delete-user']);
        });
    }

    public function registerCarPolicies()
    {
        //Car
        Gate::define('create-car',function($admin){
            return $admin->hasAccess(['create-car']);
        });
        Gate::define('update-car',function($admin){
            return $admin->hasAccess(['update-car']);
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
        Gate::define('update-car-service',function($admin){
            return $admin->hasAccess(['update-car-service']);
        });
        Gate::define('delete-car-service',function($admin){
            return $admin->hasAccess(['delete-car-service']);
        });
    }

    public function registerCategoryPolicies()
    {
        //Category
        Gate::define('create-category',function($admin){
            return $admin->hasAccess(['create-category']);
        });
        Gate::define('update-category',function($admin){
            return $admin->hasAccess(['update-category']);
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
        Gate::define('update-product',function($admin){
            return $admin->hasAccess(['update-product']);
        });
        Gate::define('delete-product',function($admin){
            return $admin->hasAccess(['delete-product']);
        });
    }
}
