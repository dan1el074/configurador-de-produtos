<?php
    namespace Repositories;

use Models\Produto;
use Repositories\Repository as Repository;
    use PDO;

    class ProdutoRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = 'SELECT * FROM tabela_exemplo';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $produto = new Produto($row["name"], $row["abbreviation"]);
                $arr[] = $produto;
            }

            return $arr;
        }
    }
?>
