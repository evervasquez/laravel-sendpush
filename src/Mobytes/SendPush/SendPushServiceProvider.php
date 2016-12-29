<?php

namespace Mobytes\SendPush;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class SendPushServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['sendpush'] = $this->app->share(function($app)
        {
            return new SendPush($app['config']);
        });

        $this->app->booting(function()
        {
            $loader = AliasLoader::getInstance();
            $loader->alias('sendpush', 'Mobytes\SendPush\SendPush');
        });

        $this->app['pushover.send'] = $this->app->share(function ()
        {
            return new Commands\SendPushCommand($this->app['sendpush']);
        });

        $this->commands(
            'sendpush.send'
        );
    }

    public function provides()
    {
        return ['sendpush'];
    }

}
