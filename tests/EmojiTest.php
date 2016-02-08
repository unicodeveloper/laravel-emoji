<?php

/*
 * This file is part of the Laravel Emoji package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Unicodeveloper\Emoji\Test;

use ReflectionClass;
use PHPUnit_Framework_TestCase;
use Unicodeveloper\Emoji\Emoji;

class EmojiTest extends PHPUnit_Framework_TestCase
{
    protected $emoji;

    public function setUp()
    {
        $this->emoji = new Emoji;
    }

    /**
     * Test the private getEmojis method
     * @return boolean
     */
    public function testGetEmojis()
    {
        $result = $this->invokeMethod($this->emoji, 'getEmojis');
        $this->assertArrayHasKey('joy', $result);
    }

    /**
     * Test that the method findByAlias returns the correct unicode value
     * @return boolean
     */
    public function testFindByAliasReturnsAppropriateUnicodeValue()
    {
        $unicodeValue = $this->emoji->findByAlias('wink');

        $realResult = $this->getEmojis();

        $this->assertEquals($unicodeValue, $realResult['wink']);
    }

    /**
     * Test that the method findByName returns the correct unicode value
     * @return boolean
     */
    public function testFindByNamesReturnsAppropriateUnicodeValue()
    {
        $unicodeValue = $this->emoji->findByName('wink');

        $realResult = $this->getEmojis();

        $this->assertEquals($unicodeValue, $realResult['wink']);
    }

    /**
     * Test that the method findByUnicode returns the correct emoji name
     * @return boolean
     */
    public function testFindByUnicodeReturnsAppropriateEmojiName()
    {
        $emojiName = $this->emoji->findByUnicode("\u{1F601}");

        $realResult = array_flip($this->getEmojis());

        $this->assertEquals($emojiName, $realResult["\u{1F601}"]);
    }

    /**
     * Test that a method that does not exist throws the right Exception
     * @expectedException Unicodeveloper\Emoji\Exceptions\UnknownMethod
     */
    public function testNonexistentMethod()
    {
        $this->emoji->findAllEmojisInThisLifeMehn();
    }

    /**
     * Test that findByAlias doesn't receive any argument
     * @expectedException Unicodeveloper\Emoji\Exceptions\IsNull
     */
    public function testfindByAliasDoesntHaveAnArgument()
    {
        $this->emoji->findByAlias();
    }

    /**
     * Test that findByName doesn't receive any argument
     * @expectedException Unicodeveloper\Emoji\Exceptions\IsNull
     */
    public function testfindByNameDoesntHaveAnArgument()
    {
        $this->emoji->findByName();
    }

    /**
     * Test that findByAlias gets an unkown emoji name
     * @expectedException Unicodeveloper\Emoji\Exceptions\UnknownEmoji
     */
    public function testAWrongEmojiNameWasCalled()
    {
        $this->emoji->findByAlias('abracadabra');
    }

    /**
     * Test that findByUnicode gets an unknown Unicode value
     * @expectedException Unicodeveloper\Emoji\Exceptions\UnknownUnicode
     */
    public function testAWrongUnicodeValueWasCalled()
    {
        $this->emoji->findByUnicode("\u{1F611}");
    }

    /**
     * Get the emojis from emoji.php
     * @return array
     */
    private function getEmojis()
    {
        $result = require( __DIR__ . "/../src/Emojis/emoji.php");

        return $result;
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    private function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $parameters);
    }

}
