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

class UnknownUnicode extends Exception
{
    public static function create($unicode) : UnknownUnicode
    {
        return new static("Unicode {$unicode} Not Found, Man. Please provide a valid UTF-8 Unicode value");
    }
}