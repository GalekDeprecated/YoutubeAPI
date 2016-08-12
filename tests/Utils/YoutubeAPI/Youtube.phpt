<?php

require_once __DIR__ . '/BaseTestCase.php';

use Tester\Assert;
use \Galek\Utils\YoutubeAPI;

class YoutubeTest extends BaseTestCase
{
    private $testKey = 'AIzaSyC9cuaEpSeW-KcF-7qaQpNVWfkbPJFLSHc';
    private $videoId = 'bBmeBVDYmKU';

    public function testBasic()
    {
    		$youtube = new YoutubeAPI();
            $youtube->setApiKey($this->testKey);
            $embed = $youtube->youtubeFix('https://www.youtube.com/watch?v=bBmeBVDYmKU');
            $getId = $youtube->youtubeGetId($embed);
            $file = __DIR__.'/src/test.json';
            $handle = fopen($file, "r");
            $output = fread($handle, filesize($file));
            fclose($handle);
    		//Assert::equal('bBmeBVDYmKU', $embed, $embed);
    		//Assert::equal('bBmeBVDYmKU', $getId, $getId);
    		//
    		Assert::equal("Empyre One MegaMix", $youtube->youtubeAPI2($output, $this->videoId, 'title'), $youtube->youtubeAPI2($output, $this->videoId, 'title'));


    		//Assert::equal("Empyre One MegaMix", $youtube->youtubeAPI($this->videoId, 'title'), 'Error Title');
    }

}

$testCase = new YoutubeTest();
$testCase->run();
