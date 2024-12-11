<?php 
    namespace Models;

    class Acabamento {
        private int $id;
        private string $name;
        private string $abbreviation;

        public function __construct(int $id, string $name, string $abbreviation) {
            $this->id = $id;
            $this->name = $name;
            $this->abbreviation = $abbreviation;
        }

        public function getId(): string {
            return $this->id;
        }

        public function getName(): string {
            return $this->name;
        }

        public function setName($name): void {
            $this->name = $name;
        }

        public function getAbbreviation(): string {
            return $this->abbreviation;
        }

        public function setAbbreviation($abbreviation): void {
            $this->abbreviation = $abbreviation;
        }

    }

?>
