<?php

namespace Fei77\LineBot;

use Illuminate\Support\ServiceProvider;

class LineBotServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/config/line-bot.php' => config_path('line-bot.php'),
            ], 'config');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(Line::class, 'Line');
    }
}