<?php
    namespace Repositories;

    use Entities\Carga;
    use Repositories\Repository as Repository;
    use PDO;

    class CargaRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = "SELECT * FROM `tb_weight`";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $weight = new Carga($row["id"], $row["name"], $row["abbreviation"]);
                $arr[] = $weight;
            }

            return $arr;
        }

        public function findById(int $id): Carga {
            $sql = "SELECT * FROM `tb_weight` WHERE `id` = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $produto = new Carga(
                    $row["id"], 
                    $row["name"], 
                    $row["abbreviation"]
                );
                $arr[] = $produto;
            }

            return $arr[0];
        }

        public function delete(int $id): void {
            $sql = "DELETE FROM `tb_weight` WHERE `id` = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
?>
