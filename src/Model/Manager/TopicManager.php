<?php
namespace App\Model\Manager;
    
    use App\Core\AbstractManager as AM;
    use App\Core\ManagerInterface;

class TopicManager extends AM implements ManagerInterface
    {
        public function __construct(){
            parent::connect();
        }
    
        public function getAll(){
            return $this->getResults(
                "App\Model\Entity\Topic",
                "SELECT * FROM topic ORDER BY createdAt DESC "
            );
        }
    
        public function getOneById($id){
            return $this->getOneOrNullResult(
                "App\Model\Entity\Topic",
                "SELECT * FROM topic  WHERE id = :num",
                [
                    "num" =>$id
                ]
            );
        }
    }