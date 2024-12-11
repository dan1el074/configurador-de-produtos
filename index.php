<?php 
    spl_autoload_register(function($class) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $file = __DIR__ . '\\' . $path . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            include('Views/pages/errors/404.php');
            die();
        }
    });

    session_start();
    $app = new Application();
    $app->execute();
?>
