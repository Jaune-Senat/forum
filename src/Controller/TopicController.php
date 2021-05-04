<?php
namespace App\Controller;
    
    use App\Core\AbstractController as AC;
    use App\Model\Manager\TopicManager;
    use App\Model\Manager\MessageManager;
   
    class TopicController extends AC
    {
        public function __construct(){
            $this->tmanager = new TopicManager;
            $this->mmanager = new MessageManager;
        }

        public function getAll(){
            return $this->render("topic/view.php");
        }

        public function voirTopic($id){

            $topic = $this->tmanager->getOneById($id);
            $messages = $this->mmanager->getAll();

            return $this->render("topic/view.php", [
                "topic"          => $topic,
                "title"          => $topic->getTitle(),
                "messages"       => $messages

            ]);
        }
    }