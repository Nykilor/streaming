<?php
namespace Streaming\Domain\Entity\Twitch;
/**
 * @Entity @Table(name="twitch_channel")
 */
class Channel {

    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $displayname;
    /** @Column(type="integer") **/
    private $viewCount;
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

    public function getDate() {
        return $this->date;
    }

}
