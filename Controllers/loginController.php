<?php 
    namespace Controllers;

    final class loginController extends Controller{

        public function __construct() {
            $this->view = new \Views\MainView('login');
        }

        public function execute(): void {
            $this->view->render(['titulo'=>'Login']);
        }
    }
?>
