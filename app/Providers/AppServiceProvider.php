<?php

namespace FreelanceTest\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use FreelanceTest\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {        
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar', function ($view) {
            $archives = \FreelanceTest\Post::archives();
            $tags = \FreelanceTest\Tag::has('posts')->pluck('name');
            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class, function() {
            return new Stripe(config('services.stripe.secret'));
        });

    }
}
