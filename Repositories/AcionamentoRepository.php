<?php
    namespace Repositories;

    use Entities\Acionamento;
    use Repositories\Repository as Repository;
    use PDO;

    class AcionamentoRepository implements Repository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function findAll(): array {
            $sql = 'SELECT * FROM tb_drive';
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arr = [];
            foreach($result as $row) {
                $drive = new Acionamento($row["id"], $row["name"], $row["abbreviation"], isset($row["rules"]) ? json_decode($row["rules"]) : json_decode('{}'));
                $arr[] = $drive;
            }

            return $arr;
        }
    }
?>
