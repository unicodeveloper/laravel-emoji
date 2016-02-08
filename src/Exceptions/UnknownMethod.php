<?php

namespace Unicodeveloper\Emoji\Exceptions;

use Exception;

class UnknownMethod extends Exception
{
    public static function create($method) : UnknownMethod
    {
        return new static("This method {$method} does not exist in this package. Please check the documentation");
    }
}