<?php

namespace Unicodeveloper\Emoji;

class Emoji {

    /**
     * Quotes
     * @var collection
     */
    protected $quotes;

    /**
     * Get the Quotes from the respective files depending on the Category
     * @param  string $category
     * @return array
     */
    private function getEmojis()
    {
        return require("Emojis/emoji.php");
    }

    public function findByAlias($emojiName = null)
    {
        if (is_null($emojiName)) {
            throw new \Exception("Please provide the name of the emoji you are looking for");
        }

        $emoji = strtolower($emojiName);

        if (! array_key_exists($emoji, $this->getEmojis())) {
            throw new \Exception("Emoji Not Found, Man. Check your spelling and try again");
        }

        return $this->getEmojis()[$emoji];
    }

    public function findByName($emojiName = null)
    {
        return $this->findByAlias($emojiName);
    }

    public function findByUnicode($unicode = null)
    {
        if (is_null($unicode)) {
            throw new \Exception("Please provide a valid UTF-8 Unicode value");
        }

        $emojis = array_flip($this->getEmojis());

        if (! array_key_exists($unicode, $emojis)) {
            throw new \Exception("Emoji Not Found, Man. Please provide a valid UTF-8 Unicode value");
        }

        return $emojis[$unicode];
    }

    public function __call($method, $parameters)
    {
        if (! method_exists(new static, $method)) {
            throw new \Exception("This method does not exist in this package. Please check the documentation");
        }
    }

}