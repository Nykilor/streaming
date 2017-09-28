<?php
namespace Streaming\Infrastructure\Repository\Twitch;
use \Streaming\Domain\Entity\Twitch as Entity;
use \Exception;
use \Streaming\Application\Base\Repository as I;

class ChannelRepository implements I\RepositoryInterface, I\ORMInterface {

    private $entity = false;
    private const ENTITY = "\Streaming\Domain\Entity\Twitch\Channel";
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
        $c = $ar["data"][0];

        $v->setDisplayName($c["display_name"]);
        $v->setViewCount($c["view_count"]);

        $this->entity = $v;
    }

}
