<?php

namespace App\Providers;

use function foo\func;
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

        //
        // adminlte
        // main menu access control
        // for now every body, except internship supervisor, can see internship in left-side menu
        Gate::define('see-menu-header-internship', function ($user){
            return true;
        });
        Gate::define('see-menu-header-alumni', function ($user){
            return $user->isAlumAdmin();
        });
        Gate::define('see-menu-header-scholarship', function ($user){
            return $user->isInternAdmin() || $user->isStudent();
        });
        Gate::define('see-menu-header-report', function ($user){
            return $user->isInternAdmin() || $user->isAlumAdmin();
        });


        // 2ndary sub menu access control
        // what students can use
        Gate::define('create-internship-application', function ($user){
            return $user->isStudent();
        });
        Gate::define('submit-internship-assignment', function ($user){
            return $user->isStudent();
        });

        // what intern admin can use
        Gate::define('approve-internship-application', function ($user){
            return $user->isInternAdmin();
        });
        Gate::define('close-internship', function ($user){
            return $user->isInternAdmin();
        });


    }
}
