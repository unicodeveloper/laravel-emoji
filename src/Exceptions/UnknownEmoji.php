<?php

namespace Unicodeveloper\Emoji\Exceptions;

use Exception;

class UnknownEmoji extends Exception
{
    public static function create($emoji) : UnknownEmoji
    {
        return new static("Emoji {$emoji} Not Found, Man. Check your spelling and try again");
    }
}