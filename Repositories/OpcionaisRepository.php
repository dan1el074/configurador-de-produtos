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
            $sql = 'SELECT * FROM tb_optional';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $optional = new Opcionais($row["id"], $row["name"], $row["abbreviation"], isset($row["options"]) ? json_decode($row["options"]) : json_decode('{}'));
                $arr[] = $optional;
            }

            return $arr;
        }
    }
?>
