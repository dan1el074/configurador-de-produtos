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
            $sql = 'SELECT * FROM tb_length';
            
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
    }
?>
