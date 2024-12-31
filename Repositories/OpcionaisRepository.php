<?php
    namespace Repositories;

    use Entities\Opcionais;
    use Repositories\Repository as Repository;
    use PDO;

    class OpcionaisRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = "SELECT * FROM `tb_optional`";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $optional = new Opcionais($row["id"], $row["name"], $row["abbreviation"], isset($row["rules"]) ? json_decode($row["rules"]) : json_decode('{}'), ($row["show_in_result"] == 1 ? true : false));
                $arr[] = $optional;
            }

            return $arr;
        }

        public function findById(int $id): Opcionais {
            $sql = "SELECT * FROM `tb_optional` WHERE `id` = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $produto = new Opcionais(
                    $row["id"], 
                    $row["name"], 
                    $row["abbreviation"],
                    isset($row["rules"]) ? json_decode($row["rules"]) : json_decode('{}'), 
                    ($row["show_in_result"] == 1 ? true : false)
                );
                $arr[] = $produto;
            }

            return $arr[0];
        }

        public function findByIds(array $ids): array {
            if(!$ids) {
                return [];
            }

            $string = implode(', ', $ids);
            $sql = "SELECT * FROM `tb_optional` WHERE `id` IN ({$string});";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $optional = new Opcionais($row["id"], $row["name"], $row["abbreviation"], isset($row["rules"]) ? json_decode($row["rules"]) : json_decode('{}'), ($row["show_in_result"] == 1 ? true : false));
                $arr[] = $optional;
            }

            return $arr;
        }

        public function delete(int $id): void {
            $sql = "DELETE FROM `tb_optional` WHERE `id` = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
?>
