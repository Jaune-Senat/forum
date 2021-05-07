<?php
namespace App\Model\Manager;
    
    use App\Core\AbstractManager as AM;
    use App\Core\ManagerInterface;
use App\Core\Session;

class MessageManager extends AM implements ManagerInterface
    {
        public function __construct(){
            parent::connect();
        }
    
        public function getAll(){
            return $this->getResults(
                "App\Model\Entity\Message",
                "SELECT * FROM message"
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

        public function getAllByTopic($topicId){
            return $this->getResults(
                "App\Model\Entity\Message",
                "SELECT * FROM message WHERE topic_id = :num",
                [
                    "num" => $topicId
                ]
            );
        }

        public function insertMessage($text,$topicId, $userId){
            return $this->executeQuery(
                "INSERT INTO message (text, user_id, topic_id) VALUES (:text, :userId, :topicId)",
                [   
                    "text" => $text,
                    "userId" => $userId,
                    "topicId" => $topicId
                ]
            );
        }
    }