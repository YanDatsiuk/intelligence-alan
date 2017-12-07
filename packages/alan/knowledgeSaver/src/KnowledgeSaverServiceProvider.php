<?php

namespace alan\KnowledgeSaver;

use Illuminate\Support\ServiceProvider;

/**
 * Class KnowledgeSaverServiceProvider
 * @package alan\KnowledgeSaver
 */
class KnowledgeSaverServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/saver.php' => config_path('saver.php'),
        ]);
    }

    public function register()
    {

    }
}