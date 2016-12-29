<?php

namespace Mobytes\SendPush;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Mobytes\SendPush\Commands\SendPushCommand;

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

        $this->app['sendpush.send'] = $this->app->share(function ()
        {
            return new SendPushCommand($this->app['sendpush']);
        });

        $this->commands(
            SendPushCommand::class
        );
    }

    public function provides()
    {
        return ['sendpush'];
    }

}
