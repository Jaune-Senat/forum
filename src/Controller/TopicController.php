<?php
namespace App\Controller;
    
    use App\Core\AbstractController as AC;
    use App\Core\Session;
    use App\Model\Manager\TopicManager;
    use App\Model\Manager\MessageManager;
    use App\Service\Paginator;

class TopicController extends AC
    {
        public function __construct(){
            $this->tmanager = new TopicManager;
            $this->mmanager = new MessageManager;
        }

        public function voirTopic($id){

            $topic = $this->tmanager->getOneById($id);
            $messages = $this->mmanager->getAllByTopic($id, Paginator::paginate());

            return $this->render("topic/view.php", [
                "topic"          => $topic,
                "title"          => $topic->getTitle(),
                "messages"       => $messages, 
                "totalMessages"  => $this->mmanager->countByTopic($id)
            ]);
        }

        public function addMessage($id){
                $message = filter_input(INPUT_POST, "response", FILTER_SANITIZE_STRING) ;
                $this->mmanager->insertMessage($message,$id, Session::get("user")->getId());

            return $this->redirectToRoute(
                "topic", "voirTopic", [
                    "id" => $id
                ]
            );
        }

        public function updateLock($id){

            $topic = $this->tmanager->getOneById($id);
            $topic->getIsAvailable() ? $this->tmanager->lockTopic($id) : $this->tmanager->unlockTopic($id);
            
            return $this->redirectToRoute(
                "topic", "voirTopic", [
                    "id" => $id
                ]
            );
        }
    }