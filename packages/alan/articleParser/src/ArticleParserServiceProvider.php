<?php

namespace Alan\ArticleParser;

use Illuminate\Support\ServiceProvider;

/**
 * Class ArticleParserServiceProvider
 * @package alan\ArticleParser
 */
class ArticleParserServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/parser.php' => config_path('parser.php'),
        ]);
    }

    public function register()
    {

    }
}