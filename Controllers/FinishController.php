<?php 
    namespace Controllers;

    final class FinishController extends Controller{

        public function __construct() {
            session_start();
            $this->view = new \Views\MainView('finish');

            if (!isset($_SESSION["weight_id"]) || !isset($_SESSION["length_id"]) || !isset($_SESSION["width_id"]) || !isset($_SESSION["drive_id"])) {
                echo "<script>window.location.href='step3';</script>";
                exit;
            }
        }

        public function execute(): void {
            $this->view->render(['titulo'=>'Finish']);
        }
    }
?>
