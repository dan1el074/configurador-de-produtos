<?php 
    namespace Controllers;

    final class FinishController extends Controller{

        public function __construct() {
            $this->view = new \Views\MainView('finish');
        }

        public function execute(): void {
            $this->view->render(['titulo'=>'Finish']);
        }
    }
?>
