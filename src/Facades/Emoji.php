<?php

/*
 * This file is part of the Laravel Emoji package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unicodeveloper\Emoji\Facades;

use Illuminate\Support\Facades\Facade;

class Emoji extends Facade {

   /**
   * Get the registered name of the component.
   *
   * @return string
   */
    protected static function getFacadeAccessor() : string
    {
        return 'laravel-emoji';
    }
}