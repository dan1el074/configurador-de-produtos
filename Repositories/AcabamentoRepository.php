<?php
    namespace Repositories;

    use Entities\Acabamento;
    use Repositories\Repository as Repository;
    use PDO;

    class AcabamentoRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = "SELECT * FROM `tb_finish`";
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

        public function findById(int $id): Acabamento {
            $sql = "SELECT * FROM `tb_finish` WHERE `id` = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $produto = new Acabamento(
                    $row["id"], 
                    $row["name"], 
                    $row["abbreviation"]
                );
                $arr[] = $produto;
            }

            return $arr[0];
        }
    }
?>
