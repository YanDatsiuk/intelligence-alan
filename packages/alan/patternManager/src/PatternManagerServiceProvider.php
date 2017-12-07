<?php

namespace alan\PatternManager;

use Illuminate\Support\ServiceProvider;

/**
 * Class PatternManagerServiceProvider
 * @package alan\PatternManager
 */
class PatternManagerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/manager.php' => config_path('manager.php'),
        ]);
    }

    public function register()
    {

    }
}