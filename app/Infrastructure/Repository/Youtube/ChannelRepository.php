<?php
namespace Streaming\Infrastructure\Repository\Youtube;
use \Streaming\Domain\Entity\Youtube as Entity;
use \Exception;
use \Streaming\Application\Base\Repository as I;

class ChannelRepository implements I\RepositoryInterface, I\ORMInterface {

    private $entity = false;
    private const ENTITY = "\Streaming\Domain\Entity\Youtube\Channel";
    //\Doctrine\ORM\EntityRepository
    public $repo;
    //\Doctrine\ORM\EntityManager
    public $em;

    public function __construct(\Doctrine\ORM\EntityManager $em = null) {
        $this->em = $em;

        if(!is_null($em)) {
            $this->repo = $this->em->getRepository(self::ENTITY);
        }
    }

    public function create() : void {
        if(is_null($this->em)) {
            throw new Exception("You have to pass 'Doctrine\ORM\EntityManager' to the class");
        }
        if($this->entity) {
            $this->em->persist($this->entity);
            $this->em->flush();
        } else {
            throw new Exception("No Entity to create.", 1);
        }
    }

    public function getEntity() {
        return $this->entity;
    }

    public function setEntity(array $ar) : void {
        $v = new Entity\Channel;
        $c = $ar["items"][0];

        $v->setYoutubeid($c["id"]);
        $v->setViewCount($c["statistics"]["viewCount"]);
        $v->setSubscriberCount($c["statistics"]["subscriberCount"]);
        $v->setVideoCount($c["statistics"]["videoCount"]);
        $v->setCommentCount($c["statistics"]["commentCount"]);

        $this->entity = $v;
    }

}
