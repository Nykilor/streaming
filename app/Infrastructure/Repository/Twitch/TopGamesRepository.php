<?php
namespace Streaming\Infrastructure\Repository\Twitch;
use \Streaming\Domain\Entity\Twitch as Entity;
use \Exception;
use \Streaming\Application\Base\Repository as I;

class TopGamesRepository implements I\RepositoryInterface, I\ORMInterface {

    private $entity = false;
    private const ENTITY = "\Streaming\Domain\Entity\Twitch\TopGames";
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

        $type = gettype($this->entity);

        if($type === "object") {
            $this->em->persist($this->entity);
        } else if ($type === "array") {
            foreach ($this->entity as $key => $value) {
                $this->em->persist($value);
            }
        } else {
            throw new Exception("Either 'object', or 'array of objects' of 'Streaming\Entity\TopGames' is allowed.", 1);
        }

        $this->em->flush();
    }

    public function getEntity() {
        return $this->entity;
    }

    public function setEntity(array $ar) : void {
        $ar_l = count($ar["top"]);

        if($ar_l === 1) {
            $c = $ar["top"][0];
            $v = new Entity\TopGames();
            $v->setGameId($c["game"]["_id"]);
            $v->setDisplayName($c["game"]["name"]);
            $v->setViewCount($c["viewers"]);
            $v->setChannelCount($c["channels"]);
        } else if($ar_l > 1) {
            $c = $ar["top"];
            $v = [];
            foreach ($c as $key => $val) {
                $ve = new Entity\TopGames();
                $ve->setGameId($val["game"]["_id"]);
                $ve->setDisplayName($val["game"]["name"]);
                $ve->setViewCount($val["viewers"]);
                $ve->setChannelCount($val["channels"]);
                $v[] = $ve;
            }
        } else {
            throw new Exception("The array can't be empty", 1);
        }

        $this->entity = $v;
    }

}
