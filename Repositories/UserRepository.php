<?php
    namespace Repositories;

    use Entities\User;
    use PDO;

    class UserRepository {

        private PDO $pdo;

        public function __construct() {
            $conection = new Conection();
            $this->pdo = $conection->connect();
        }

        public function login(string $name, string $password): User | null {
            $sql = "SELECT * FROM `tb_user` WHERE `name` = '$name'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $row) {
                if (password_verify($password, $row["password"])) {
                    return new User($row["id"], $row["name"], $row["password"]);
                }
            }

            return null;
        }
    }
?>
