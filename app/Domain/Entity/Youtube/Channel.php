<?php
namespace Streaming\Domain\Entity\Youtube;
/**
 * @Entity @Table(name="youtube_channel")
 */
class Channel {

    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $youtubeid;
    /** @Column(type="integer") **/
    private $viewCount;
    /** @Column(type="integer") **/
    private $subscriberCount;
    /** @Column(type="integer") **/
    private $videoCount;
    /** @Column(type="integer") **/
    private $commentCount;
    /** @Column(type="datetime") **/
    private $date;

    public function __construct(){
        $this->date = new \DateTime();
    }

    public function getYoutubeid() {
        return $this->youtubeid;
    }

    public function setYoutubeid($v) {
        $this->youtubeid = $v;
    }

    public function getViewCount() {
        return $this->viewCount;
    }

    public function setViewCount($v) {
        $this->viewCount = $v;
    }

    public function getSubscriberCount() {
        return $this->subscriberCount;
    }

    public function setSubscriberCount($v) {
        $this->subscriberCount = $v;
    }

    public function getVideoCount() {
        return $this->videoCount;
    }

    public function setVideoCount($v) {
        $this->videoCount = $v;
    }

    public function getCommentCount() {
        return $this->commentCount;
    }

    public function setCommentCount($v) {
        $this->commentCount = $v;
    }

    public function getDate() {
        return $this->date;
    }

}
