<?php
namespace Streaming\Infrastructure\Repository\Youtube;
use \Streaming\Domain\Entity\Youtube as Entity;
use \Exception;
use \Streaming\Application\Base\Repository as I;

class VideoRepository implements I\RepositoryInterface, I\ORMInterface {

    private $entity;
    private const ENTITY = "\Streaming\Domain\Entity\Youtube\Video";
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
            throw new Exception("Either 'object', or 'array of objects' of 'Streaming\Entity\YoutubeVideo' is allowed and must be given.", 1);
        }

        $this->em->flush();
    }

    public function getEntity() {
        return $this->entity;
    }

    public function setEntity(array $ar) : void {
        $ar_l = count($ar["items"]);

        if($ar_l === 1) {
            $c = $ar["items"][0];
            $v = new Entity\Video();
            $v->setYoutubeid($c["id"]);
            $v->setViewCount($c["statistics"]["viewCount"]);
            $v->setLikeCount($c["statistics"]["likeCount"]);
            $v->setDislikeCount($c["statistics"]["dislikeCount"]);
            $v->setFavoriteCount($c["statistics"]["favoriteCount"]);
            $v->setCommentCount($c["statistics"]["commentCount"]);
        } else if($ar_l > 1) {
            $c = $ar["items"];
            $v = [];
            foreach ($c as $key => $val) {
                $ve = new Entity\Video();
                $ve->setYoutubeid($val["id"]);
                $ve->setViewCount($val["statistics"]["viewCount"]);
                $ve->setLikeCount($val["statistics"]["likeCount"]);
                $ve->setDislikeCount($val["statistics"]["dislikeCount"]);
                $ve->setFavoriteCount($val["statistics"]["favoriteCount"]);
                $ve->setCommentCount($val["statistics"]["commentCount"]);
                $v[] = $ve;
            }
        } else {
            throw new Exception("The array can't be empty", 1);
        }

        $this->entity = $v;
    }
}
