<?php

namespace Unicodeveloper\Emoji\Exceptions;

use Exception;

class UnknownUnicode extends Exception
{
    public static function create($unicode) : UnknownUnicode
    {
        return new static("Unicode {$unicode} Not Found, Man. Please provide a valid UTF-8 Unicode value");
    }
}