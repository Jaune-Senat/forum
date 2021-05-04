<?php
namespace App\Model\Manager;
    
    use App\Core\AbstractManager as AM;
    use App\Core\ManagerInterface;

class MessageManager extends AM implements ManagerInterface
    {
        public function __construct(){
            parent::connect();
        }
    
        public function getAll(){
            return $this->getResults(
                "App\Model\Entity\Message",
                "SELECT * FROM message m, topic t
                WHERE m.topic_id = t.id"
            );
        }

        public function getOneById($id)
        {
            return $this->getOneOrNullResult(
                "App\Model\Entity\Message",
                "SELECT * FROM message WHERE id = :num",
                [
                    "num" => $id
                ]
            );
        }
    }