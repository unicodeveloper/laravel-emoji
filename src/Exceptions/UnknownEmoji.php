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

class UnknownEmoji extends Exception
{
    public static function create($emoji) : UnknownEmoji
    {
        return new static("Emoji {$emoji} Not Found, Man. Check your spelling and try again");
    }
}