<?php

namespace Alan\NlAnalyzer;

use Illuminate\Support\ServiceProvider;

/**
 * Class NLAnalyzerServiceProvider
 * @package alan\NlAnalyzer
 */
class NLAnalyzerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/analyzer.php' => config_path('analyzer.php'),
        ]);
    }

    public function register()
    {

    }
}