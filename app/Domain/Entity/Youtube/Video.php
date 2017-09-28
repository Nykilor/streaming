<?php
namespace Streaming\Domain\Entity\Youtube;
/**
 * @Entity @Table(name="youtube_video")
 */
class Video {

    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $youtubeid;
    /** @Column(type="integer") **/
    private $viewCount;
    /** @Column(type="integer") **/
    private $likeCount;
    /** @Column(type="integer") **/
    private $dislikeCount;
    /** @Column(type="integer") **/
    private $favoriteCount;
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

    public function setYoutubeid($youtubeid) {
        $this->youtubeid = $youtubeid;
    }

    public function getViewCount() {
        return $this->viewCount;
    }

    public function setViewCount($viewCount) {
        $this->viewCount = $viewCount;
    }

    public function getLikeCount() {
        return $this->likeCount;
    }

    public function setLikeCount($v) {
        $this->likeCount = $v;
    }

    public function getDislikeCount() {
        return $this->dislikeCount;
    }

    public function setDislikeCount($v) {
        $this->dislikeCount = $v;
    }

    public function getFavoriteCount() {
        return $this->favoriteCount;
    }

    public function setFavoriteCount($v) {
        $this->favoriteCount = $v;
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
