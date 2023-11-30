<?php

namespace Cornatul\Articles\Providers;

use Cornatul\Articles\Crud\LinkCrud;
use Illuminate\Support\ServiceProvider;


/**
 * Class AppServiceProvider
 * @package Cornatul\Articles\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \Cornatul\Articles\Extractor\ExtractorInterface::class,
            \Cornatul\Articles\Extractor\ExtractorService::class
        );

        $this->app->bind(
            \GuzzleHttp\ClientInterface::class,
            \GuzzleHttp\Client::class
        );

    }
}
