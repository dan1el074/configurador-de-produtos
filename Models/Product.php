<?php 
    namespace Models;

    class Product {
        private string $name;
        private string $abbreviation;

        public function __construct(string $name, string $abbreviation) {
            $this->name = $name;
            $this->abbreviation = $abbreviation;
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
