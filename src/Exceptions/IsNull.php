<?php

namespace Unicodeveloper\Emoji\Exceptions;

use Exception;

class IsNull extends Exception
{
    public static function create($message) : IsNull
    {
        return new static("{$message}");
    }
}