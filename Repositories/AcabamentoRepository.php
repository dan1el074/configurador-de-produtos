<?php
    namespace Repositories;

    use Models\Acabamento;
    use Repositories\Repository as Repository;
    use PDO;

    class AcabamentoRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = 'SELECT * FROM tb_finish';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $produto = new Acabamento($row["id"], $row["name"], $row["abbreviation"]);
                $arr[] = $produto;
            }

            return $arr;
        }
    }
?>
