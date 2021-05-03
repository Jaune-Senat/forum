<?php
    namespace App\Controller;
    
    use App\Core\AbstractController as AC;
    use App\Model\Manager\TopicManager;
   
    class HomeController extends AC
    {
        public function __construct(){
            $this->manager = new TopicManager;
        }

        public function index()
        {
            
            return $this->render("home/home.php", [
                "controller_name" => get_class($this),
                "title"           => "Home"
            ]);
        }

    }