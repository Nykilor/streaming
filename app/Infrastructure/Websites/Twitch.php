<?php
namespace Streaming\Infrastructure\Websites;
use \Exception;

class Twitch {

    private $key;

    public function __construct($api_key) {
        $this->key = $api_key;
    }

    // https://dev.twitch.tv/docs/api/reference#get-users
    public function getChannels(array $get) : array {
        $url = $this->setUrl($get, "users");

        $content = $this->getContent($url);

        return $content;
    }

    //https://dev.twitch.tv/docs/api/reference#get-streams
    public function getStreams(array $get) {
        $url = $this->setUrl($get, "streams");

        $content = $this->getContent($url);

        return $content;
    }

    //https://dev.twitch.tv/docs/v3/reference/games
    //Possibly won't work at end of 2018
    public function getTopGames(int $limit, int $offset = 0) {
        $url = "https://api.twitch.tv/kraken/games/top?limit=$limit";

        $content = $this->getContent($url);

        return $content;
    }

    private function setUrl(array $get, string $for) : string {
        $vars = "/?";

        foreach ($get as $key => $value) {
            $vars .= "$key=$value&";
        }

        $vars = rtrim($vars, "&");
        $url = "https://api.twitch.tv/helix/".$for.$vars;

        return $url;
    }

    private function getContent($url) : array {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Client-ID: ' . $this->key,
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $r = curl_exec($ch);
        $i = curl_getinfo($ch);
        curl_close($ch);

        return $json = json_decode($r, true);
    }

}
