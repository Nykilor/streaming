<?php
namespace Streaming\Domain\Entity\Twitch;
/**
 * @Entity @Table(name="top_games")
 */
class TopGames {

    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="integer") **/
    private $gameId;
    /** @Column(type="string") **/
    private $displayname;
    /** @Column(type="integer") **/
    private $viewCount;
    /** @Column(type="integer") **/
    private $channelCount;
    /** @Column(type="datetime") **/
    private $date;

    public function __construct(){
        $this->date = new \DateTime();
    }

    public function setDisplayName($v) {
        $this->displayname = $v;
    }

    public function getDisplayName() {
        return $this->displayname;
    }

    public function setViewCount($v) {
        $this->viewCount = $v;
    }

    public function getViewCount() {
        return $this->viewCount;
    }

    public function setChannelCount($v) {
        $this->channelCount = $v;
    }

    public function getChannelCount() {
        return $this->channelCount;
    }

    public function getGameId() {
        return $this->gameId;
    }

    public function setGameId($v) {
        $this->gameId = $v;
    }


    public function getDate() {
        return $this->date;
    }

}
