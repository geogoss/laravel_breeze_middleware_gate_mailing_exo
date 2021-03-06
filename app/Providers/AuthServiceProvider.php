<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('test', function ($user, $article) {
            return $user->id == $article->user_id || $user->role->role == 'admin';
        });
        
        Gate::define('redac', function ($user, $article) {
            return $user->id == $article->user_id && $user->role->role == 'redacteur' || $user->role->role == 'admin' ;
        });

        Gate::define('admin', function ($user, $users) {
            return $users->role->role != 'admin';
        });
        Gate::define('test2', function ($user, $role) {
            return $user->id == $role->user_id;
        });
        


    }
}
