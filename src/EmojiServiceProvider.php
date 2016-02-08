<?php

/*
 * This file is part of the Laravel Emoji package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unicodeveloper\Emoji;

use Illuminate\Support\ServiceProvider;

class EmojiServiceProvider extends ServiceProvider {

    /*
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
    protected $defer = false;


    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        $this->app->bind('laravel-emoji', function() {

          return new Emoji;

        });
    }

    /**
    * Get the services provided by the provider
    * @return array
    */
    public function provides() : array
    {
      return ['laravel-emoji'];
    }
}