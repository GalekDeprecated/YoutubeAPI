<?php

namespace Galek\Utils;

class YoutubeAPI
{

    public $apiKey = 'AIzaSyC9cuaEpSeW-KcF-7qaQpNVWfkbPJFLSHc';

    public function setApiKey($key)
    {
        $this->apiKey = $key;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Fix url Youtube url
     * Replace watch?v= to embed/
     * @param string $src
     * @return string
     */
    public function youtubeFix($src)
    {
        return str_replace('https://', '', str_replace('?rel=0', '', str_replace("watch?v=", "embed/", $src)));
    }
    /**
     * Get id of Youtube from string
     * @param string $src
     * @return string
     */
    public function youtubeGetId($src)
    {
        return preg_replace("#(.*?)embed/(.*?)#", "$2", trim($src));
    }
    /**
     * Get youtube API
     * @param string $id
     * @param string $get
     * @return string
     */
    public function youtubeAPI($id, $get, $category = 'snippet')
    {
	    $video_ID = trim($id);
	    //$jsonURL = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$video_ID."&key=AIzaSyC9cuaEpSeW-KcF-7qaQpNVWfkbPJFLSHc&part=snippet,contentDetails,statistics,status");
        $json = json_decode(@file_get_contents("https://www.googleapis.com/youtube/v3/videos?id={$video_ID}&key=".$this->getApiKey()."&part=snippet,contentDetails,statistics,status"),true);

		return (array_key_exists(0, $json['items']) ? $json['items'][0][$category][$get] : "");
    }

    public function youtubeAPI2($source, $id, $get, $category = 'snippet')
    {
       $video_ID = trim($id);
       //$jsonURL = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$video_ID."&key=AIzaSyC9cuaEpSeW-KcF-7qaQpNVWfkbPJFLSHc&part=snippet,contentDetails,statistics,status");
       $json = json_decode($source,true);

       return (array_key_exists(0, $json['items']) ? $json['items'][0][$category][$get] : "");
    }

    /**
     * Get youtube Json data
     * @param object $json
     * @param string $get
     * @return string
     */
    public function youtubeJson($json, $get)
    {
    	if ($json['items'][0]) {
    	    $snippet = $json['items'][0]['snippet'];
    	    return $snippet[$get];
    	} elseif ($json['items']) {
    	    $snippet = $json['items']['snippet'];
    	    return $snippet[$get];
        } else {
            return "";
        }
    }
}
