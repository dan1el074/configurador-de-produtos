<?php 
    namespace Entities;

    class User {
        private int $id;
        private string $name;
        private string $password;

        public function __construct(int $id, string $name, string $password) {
            $this->id = $id;
            $this->name = $name;
            $this->password = $password;
        }

        public function getId(): int {
            return $this->id;
        }

        public function getName(): string {
            return $this->name;
        }

        public function setName($name): void {
            $this->name = $name;
        }

        public function setPassword($password): void {
            $this->password = $password;
        }
    }

?>
