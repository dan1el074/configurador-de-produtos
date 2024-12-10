<?php 
    define('INCLUDE_PATH_FULL', 'http://localhost/configurador-de-produtos/Views/pages/');
    define('INCLUDE_PATH', 'http://localhost/configurador-de-produtos/');

    // define('INCLUDE_PATH_FULL', 'http://metaro-ti/configurador-de-produtos/Views/pages/');
    // define('INCLUDE_PATH', 'http://metaro-ti/configurador-de-produtos/');

    class Application {
        private string $url;

        public function __construct() {
            $this->url = "";
        }
        
        public function execute() {
            if(isset($_GET['url'])) {
                $this->url = explode('/', $_GET['url'])[0];
            }
            if(!strlen($this->url)) {
                $this->url = 'Home';
            }

            $this->url = ucfirst($this->url);
            $this->url .= 'Controller';

            $className = 'Controllers\\'.$this->url;
            $controller = new $className();
            $controller->execute();
        }
    }

?>
