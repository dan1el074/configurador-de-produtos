<?php 
    namespace Entities;

    class Produto {
        private int $id;
        private string $name;
        private string $abbreviation;
        private object $options;

        public function __construct(int $id, string $name, string $abbreviation, object $options) {
            $this->id = $id;
            $this->name = $name;
            $this->abbreviation = $abbreviation;
            $this->options = $options;
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

        public function getOptions(): object {
            return $this->options;
        }

        public function setOptions($options): void {
            $this->options = $options;
        }
    }

?>
