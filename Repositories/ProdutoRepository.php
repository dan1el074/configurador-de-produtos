<?php
    namespace Repositories;

    use Entities\Produto;
    use Repositories\Repository as Repository;
    use PDO;

    class ProdutoRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = 'SELECT * FROM tb_products';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $produto = new Produto($row["id"], $row["name"], $row["abbreviation"], json_decode($row["options"]), isset($row["rules"]) ? json_decode($row["rules"]) : json_decode('{}'));
                $arr[] = $produto;
            }

            return $arr;
        }
    }
?>
