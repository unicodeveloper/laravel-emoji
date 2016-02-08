# laravel-emoji

[![Latest Stable Version](https://poser.pugx.org/unicodeveloper/laravel-emoji/v/stable.svg)](https://packagist.org/packages/unicodeveloper/laravel-emoji)
[![License](https://poser.pugx.org/unicodeveloper/laravel-emoji/license.svg)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/unicodeveloper/laravel-emoji.svg)](https://travis-ci.org/unicodeveloper/laravel-emoji)
[![Quality Score](https://img.shields.io/scrutinizer/g/unicodeveloper/laravel-emoji.svg?style=flat-square)](https://scrutinizer-ci.com/g/unicodeveloper/laravel-emoji)
[![Total Downloads](https://img.shields.io/packagist/dt/unicodeveloper/laravel-emoji.svg?style=flat-square)](https://packagist.org/packages/unicodeveloper/laravel-emoji)

> A Laravel 5 Package for Using & Working With Emojis in your Laravel Apps

## Installation

[PHP](https://php.net) 5.4+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel Emoji, simply add the following line to the require block of your `composer.json` file.

```
"unicodeveloper/laravel-emoji": "1.0.*"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

Once Laravel Emoji is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `Unicodeveloper\Emoji\EmojiServiceProvider::class`

Also, register the Facade like so:

```php
'aliases' => [
    ...
    'Emoji' => Unicodeveloper\Emoji\Facades\Emoji::class,
    ...
]
```

## Usage

Translate Emoji names to Unicode and Vice-versa.

```php
>> Emoji::findByAlias("kissing_heart")
=> "😘"

>> Emoji::findByName("sunglasses")
=> "😎"

>> Emoji::findByUnicode("\u{1F603}")
=> "smiley"

```
This package contains some of the characters listed on http://unicode.org/emoji/charts/full-emoji-list.html

## Contributing

Please feel free to fork this package and contribute by submitting a pull request to enhance the functionalities.

I am accepting PR's that add characters to emoji.php.
Please use [this list](http://unicode.org/emoji/charts/full-emoji-list.html) to look up the unicode value and
the name of the character.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/unicodeveloper)!

Thanks!
Prosper Otemuyiwa.

## Inspiration

* [Emoji](https://github.com/spatie/emoji)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
