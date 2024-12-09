<?php
    namespace Repositories;

    use PDO;
    use PDOException;

    class Conection {
        private $host;
        private $dbname;
        private $user;
        private $pass;

        public function __construct() {
            $this->host = "127.0.0.1";
            $this->dbname = "product_config";
            $this->user = "root";
            $this->pass = "";
        }

        public function connect(): ?PDO {
            try {
                $pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $erro) {
                echo "Ocorreu um erro de conexão: {$erro->getMessage()}";
                return null;
            }
        }
    }
?>
