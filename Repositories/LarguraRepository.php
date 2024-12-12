<?php
    namespace Repositories;

    use Entities\Largura;
    use Repositories\Repository as Repository;
    use PDO;

    class LarguraRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = 'SELECT * FROM tb_width';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $width = new Largura($row["id"], $row["name"], $row["abbreviation"]);
                $arr[] = $width;
            }

            return $arr;
        }
    }
?>
