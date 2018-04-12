<?php

namespace FreelanceTest\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Resources\Json\Resource;
use FreelanceTest\Billing\Stripe;
use FreelanceTest\Channel;


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
        //Resource::withoutWrapping();
        view()->composer('layouts.sidebar', function ($view) {
            $archives = \FreelanceTest\Post::archives();
            $tags = \FreelanceTest\Tag::has('posts')->pluck('name');
            $view->with(compact('archives', 'tags'));
        });
        view()->composer('*', function ($view){
            $channels = \Cache::rememberForever('channels', function() {
                return Channel::all();
            });
            $view->with('channels', $channels);
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
