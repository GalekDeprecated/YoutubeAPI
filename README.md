# Youtube API

[![Travis] (https://travis-ci.org/JanGalek/YoutubeAPI.svg?branch=master)](https://travis-ci.org/JanGalek/YoutubeAPI)
[![Downloads this Month](https://img.shields.io/packagist/dm/galek/youtube-api.svg)](https://packagist.org/packages/galek/youtube-api)

Requires
========
php_openssl  
allow_url_include = On


Package Installation
-------------------

The best way to install Youtube API is using [Composer](http://getcomposer.org/):

```sh
$ composer require galek/youtube-api
```

[Packagist - Versions](https://packagist.org/packages/galek/youtube-api)

or manual edit composer.json in your project

```json
"require": {
    "galek/youtube-api": "@dev"
}
```

Usage
-----

```php
    use \Galek\Utils\YoutubeAPI;

    $device = new YoutubeAPI();

    // Set Your Youtube API KEY
    $youtube->setApiKey($this->testKey);

    //Get link for iframe
     $youtube->youtubeFix('https://www.youtube.com/watch?v=bBmeBVDYmKU');

    // Get Youtube Video ID
    $youtube->youtubeGetId('https://www.youtube.com/watch?v=bBmeBVDYmKU');

    // Get Title of Video
    $youtube->youtubeAPI($this->videoId, 'title');

```

Need write some readme....
