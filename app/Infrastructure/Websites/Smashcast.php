<?php
namespace Streaming\Infrastructure\Websites;
use \Exception;

class Smashcast {

    //http://developers.hitbox.tv/#get-user-object
    public function getUser($who) {
        $url = $this->setUrl("user", $who);

        $content = $this->getContent($url);

        return $content;
    }

    private function setUrl(string $what, string $who) : string {

        $url = "https://api.smashcast.tv/".$what."/".$who;

        return $url;
    }

    private function getContent($url, array $post = null) :? array {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(!is_null($post)) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        $r = curl_exec($ch);
        $i = curl_getinfo($ch);
        curl_close($ch);

        return $json = json_decode($r, true);
    }

}
