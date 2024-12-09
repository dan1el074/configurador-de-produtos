<?php 
    namespace Controllers;

    final class HomeController extends Controller{
        public function __construct() {
            $this->view = new \Views\MainView('home');
        }
        public function execute(): void {
            $this->view->render(['titulo'=>'home']);
        }
    }

?>