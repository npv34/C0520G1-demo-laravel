<?php

namespace App\Providers;

use App\Http\Controllers\RoleConstant;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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

        Gate::define('crud-user', function ($user){
            foreach ($user->roles as $role) {
                if ($role->id == RoleConstant::ADMIN) {
                    return true;
                }
            }
            return false;
        });
    }
}
