<?php
namespace Streaming\Infrastructure\Websites;
use \Exception;

class Youtube {

    private $key;

    public function __construct($api_key) {
        $this->key = $api_key;
    }

    // https://developers.google.com/youtube/v3/docs/videos/list
    // $by = "id" || "forUsername"
    public function getVideo(string $id, string $by = "id", $part = ["statistics"]) : array {
        $url = $this->setUrl([$id],"videos", $by, $part);

        $content = $this->getContent($url);

        return $content;
    }

    public function getVideos(array $id, $part = ["statistics"]) : array {
        $url = $this->setUrl($id, "videos", "id", $part);

        $content = $this->getContent($url);

        return $content;
    }

    // https://developers.google.com/youtube/v3/docs/channels
    // $by = "id" || "forUsername"
    public function getChannel(string $id, string $by = "id", $part = ["statistics"]) : array {
        $url = $this->setUrl([$id],"channels", $by, $part);

        $content = $this->getContent($url);

        return $content;
    }

    private function setUrl(array $id, string $type, string $by, array $part) : string {

        if(!in_array($by, ["id", "forUsername"])) throw new Exception("You're only allowed to search by 'id' or 'forUsername'", 1);

        $id = urlencode(join($id, ","));
        $url = "https://www.googleapis.com/youtube/v3/".$type."/"."?".$by."=".$id."&part=";
        $part = urlencode(join($part, ","));
        $url = $url . $part . "&" . $this->getKey();

        return $url;
    }

    private function getKey() : string {
        return "key=" . $this->key;
    }

    private function getContent($url) : array {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($code !== 200) {
          return ["code" => $code];
        } else {
          return json_decode($output, 1);
        }
    }

}
