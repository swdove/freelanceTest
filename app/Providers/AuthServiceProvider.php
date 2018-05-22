<?php

namespace FreelanceTest\Providers;

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
        'FreelanceTest\Thread' => 'FreelanceTest\Policies\ThreadPolicy',
        'FreelanceTest\Reply' => 'FreelanceTest\Policies\ReplyPolicy',
        'FreelanceTest\User' => 'FreelanceTest\Policies\UserPolicy',
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
    }
}
