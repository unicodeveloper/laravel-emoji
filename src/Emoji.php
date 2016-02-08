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

use Unicodeveloper\Emoji\Exceptions\{ UnknownMethod, UnknownEmoji, UnknownUnicode, IsNull };

class Emoji {

    /**
     * Get the Emojis from emoji.php
     * @return array
     */
    private function getEmojis() : array
    {
        return require("Emojis/emoji.php");
    }

    /**
     * Get the emoji  by passing the commonly used emoji name
     * @param  string $emojiName
     * @return unicode
     * @throws \Unicodeveloper\Emoji\Exceptions\IsNull
     * @throws \Unicodeveloper\Emoji\Exceptions\UnknownUnicode
     */
    public function findByAlias($emojiName = null) : string
    {
        if (is_null($emojiName)) {
            throw IsNull::create("Please provide the name of the emoji you are looking for");
        }

        $emoji = strtolower($emojiName);

        if (! array_key_exists($emoji, $this->getEmojis())) {
            throw UnknownEmoji::create($emoji);
        }

        return $this->getEmojis()[$emoji];
    }

    /**
     * Get the emoji  by passing the commonly used emoji name
     * Alias for findByAlias
     * @param  string $emojiName
     * @return unicode
     */
    public function findByName($emojiName = null) : string
    {
        return $this->findByAlias($emojiName);
    }

    /**
     * Get the emoji name by passing the unicode value
     * @param  string $unicode
     * @return string
     * @throws \Unicodeveloper\Emoji\Exceptions\IsNull
     * @throws \Unicodeveloper\Emoji\Exceptions\UnknownUnicode
     */
    public function findByUnicode($unicode = null) : string
    {
        if (is_null($unicode)) {
            throw IsNull::create("Please provide a valid UTF-8 Unicode value");
        }

        $emojis = array_flip($this->getEmojis());

        if (! array_key_exists($unicode, $emojis)) {
            throw UnknownUnicode::create($unicode);
        }

        return $emojis[$unicode];
    }

    /**
     * Ensure that a proper exception is thrown for methods that do not exist
     * @param  string $method
     * @param  array $parameters
     * @throws \Unicodeveloper\Emoji\Exceptions\UnknownMethod
     */
    public function __call($method, $parameters)
    {
        if (! method_exists(new static, $method)) {
            throw UnknownMethod::create($method);
        }
    }

}