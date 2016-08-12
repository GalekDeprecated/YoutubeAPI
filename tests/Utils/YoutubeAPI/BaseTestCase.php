<?php

$container = require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../../src/Galek/Utils/YoutubeAPI.php';

Tester\Environment::setup();
date_default_timezone_set('Europe/Prague');

abstract class BaseTestCase extends Tester\TestCase
{

  	public function __construct(){}

}
