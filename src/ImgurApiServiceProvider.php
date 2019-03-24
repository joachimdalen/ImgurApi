<?php

namespace JoachimDalen\ImgurApi;

use Illuminate\Support\ServiceProvider;

class ImgurApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/imgur.php' => config_path('imgur.php'),
        ], 'config');
    }

    public function register()
    {
    }
}
