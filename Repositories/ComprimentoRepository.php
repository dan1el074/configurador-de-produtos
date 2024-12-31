<?php
    namespace Repositories;

    use Entities\Comprimento;
    use Repositories\Repository as Repository;
    use PDO;

    class ComprimentoRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = "SELECT * FROM `tb_length`";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $length = new Comprimento($row["id"], $row["name"], $row["abbreviation"]);
                $arr[] = $length;
            }

            return $arr;
        }

        public function findById(int $id): Comprimento {
            $sql = "SELECT * FROM `tb_length` WHERE `id` = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $produto = new Comprimento(
                    $row["id"], 
                    $row["name"], 
                    $row["abbreviation"]
                );
                $arr[] = $produto;
            }

            return $arr[0];
        }

        public function delete(int $id): void {
            $sql = "DELETE FROM `tb_length` WHERE `id` = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
?>
