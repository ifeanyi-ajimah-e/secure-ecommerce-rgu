<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users','App\Policies\UserPolicy@manageUsers');
        Gate::define('view-users','App\Policies\UserPolicy@viewUsers');
        
        Gate::define('manage-products','App\Policies\ProductPolicy@manageProducts');
        Gate::define('view-products','App\Policies\ProductPolicy@viewProducts');

        Gate::define('manage-categories','App\Policies\CategoryPolicy@manageCategories');
        Gate::define('view-categories','App\Policies\CategoryPolicy@viewCategories');

        Gate::define('manage-orders','App\Policies\OrderPolicy@manageOrders');
        Gate::define('view-orders','App\Policies\OrderPolicy@viewOrders');

        Gate::define('manage-roles-and-permissions','App\Policies\RolePolicy@manageRolesAndPermissions');
        Gate::define('view-roles-and-permissions','App\Policies\RolePolicy@viewRolesAndPermissions');

    }
}
