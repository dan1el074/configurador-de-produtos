<?php 
    namespace Controllers;

    final class LoginController extends Controller{

        public function __construct() {
            session_start();
            $this->view = new \Views\MainView('login');
        }

        public function execute(): void {
            $this->view->render(['titulo'=>'Login']);
        }
    }
?>
