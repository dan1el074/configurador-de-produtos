<?php 
    namespace Controllers;

    use Views\MainView;

    final class LogoutController extends Controller{

        public function __construct() {
            session_start();
        }

        public function execute(): void {
            session_destroy();
            echo "<script>window.location.href='home';</script>";
        }
    }
?>
