<?php
namespace AhmedEid\Message;

use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'message');

    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }
}
