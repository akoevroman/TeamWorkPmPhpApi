<?php

namespace TeamWorkPm;

use Illuminate\Support\ServiceProvider;

class TeamworkServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('teamworkpm', function($app)
        {
            Auth::set($app['config']->get('services.teamwork.url'),$app['config']->get('services.teamwork.key'));

            return new Factory();
        });
        $this->app->bind('TeamWorkPm\Factory', 'teamworkpm');
    }
}
