<?php

namespace App\Providers;

use App\Models\Dana;
use App\Models\Jabatan;
use App\Policies\DanaPolicy;
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
        Dana::class => DanaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // define roles

        Gate::define('isSuperAdmin', function ($user) {
           return $user->jabatan_id === Jabatan::SUPER_ADMIN;
        });

        Gate::define('isAdmin', function ($user) {
            return $user->jabatan_id === Jabatan::ADMIN;
        });

        Gate::define('isBendahara', function ($user) {
            return $user->jabatan_id === Jabatan::BENDAHARA;
        });

        Gate::define('isWarga', function ($user) {
            return $user->jabatan_id === Jabatan::WARGA;
        });

        Gate::define('create-dana', [DanaPolicy::class, 'create']);
    }
}
