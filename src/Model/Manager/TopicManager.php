<?php
namespace App\Model\Manager;
    
    use App\Core\AbstractManager as AM;
    use App\Core\ManagerInterface;

class TopicManager extends AM implements ManagerInterface
    {
        public function __construct(){
            parent::connect();
        }
    
        public function getAll($pagination = ""){
            return $this->getResults(
                "App\Model\Entity\Topic",
                "SELECT * FROM topic ORDER BY createdAt DESC ".$pagination
            );
        }
    
        public function getOneById($id){
            return $this->getOneOrNullResult(
                "App\Model\Entity\Topic",
                "SELECT * FROM topic  WHERE id = :num",
                [
                    ":num" =>$id
                ]
            );
        }

        public function lockTopic($id){
            return $this->executeQuery(
                "UPDATE topic
                SET isAvailable = 0
                WHERE id = :num",
                [
                    ":num" => $id
                ]
            );
        }

        public function unlockTopic($id){
            return $this->executeQuery(
                "UPDATE topic
                SET isAvailable = 1
                WHERE id = :num",
                [
                    ":num" => $id
                ]
            );
        }
    }