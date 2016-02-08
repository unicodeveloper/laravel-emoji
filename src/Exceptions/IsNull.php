<?php

/*
 * This file is part of the Laravel Emoji package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unicodeveloper\Emoji\Exceptions;

use Exception;

class IsNull extends Exception
{
    public static function create($message) : IsNull
    {
        return new static("{$message}");
    }
}