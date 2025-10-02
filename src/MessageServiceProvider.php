<?php
namespace AhmedGomaaEid\Message;

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
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/message'),
        ], 'message-views');
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
