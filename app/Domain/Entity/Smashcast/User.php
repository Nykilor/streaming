<?php
namespace Streaming\Domain\Entity\Smashcast;
/**
 * @Entity @Table(name="smashcast_user")
 */
class User {

    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $name;
    /** @Column(type="integer", nullable=true) **/
    private $followers;
    /** @Column(type="datetime") **/
    private $date;

    public function __construct(){
        $this->date = new \DateTime();
    }

    public function setName($v) {
        $this->name = $v;
    }

    public function getName() {
        return $this->name;
    }

    public function setFollowers($v) {
        $this->followers = $v;
    }

    public function getFollowers() {
        return $this->followers;
    }

    public function getDate() {
        return $this->date;
    }

}
