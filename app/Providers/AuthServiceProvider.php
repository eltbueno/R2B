<?php

namespace r2b\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'r2b\Model' => 'r2b\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('admin', function ($user)
        {
            return $user->perfil == 'administrador';
        });
        
        $gate->define('comercial', function ($user)
        {
            return $user->perfil == 'comercial' || $user->perfil == 'administrador';
        });
        $gate->define('operacional', function ($user)
        {
            return $user->perfil == 'operacional'|| $user->perfil == 'administrador';
        });
    }
}
