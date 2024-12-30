<?php 
    namespace Controllers;

    use Services\UserService;
    use Views\MainView;

    final class LoginController extends Controller{
        private UserService $userService;
        private bool $loginFail;

        public function __construct() {
            session_start();
            $this->loginFail = false;
            $this->userService = new UserService();
            $this->init();
        }

        public function init(): void {
            if(isset($_POST['action'])) {
                $user = $this->userService->login($_POST['user'], $_POST['password']);

                if($user !== null) {
                    $_SESSION['user'] = $user;
                    echo "<script>window.location.href='home';</script>";
                    return;
                }

                $this->loginFail = true;
            }

            $this->view = new MainView('login','loginHeader', 'loginFooter');
        }

        public function execute(): void {
            $this->view->render(['titulo'=>'Login','login'=>$this->loginFail]);
        }
    }
?>
