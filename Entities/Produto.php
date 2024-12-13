<?php 
    namespace Entities;

    class Produto {
        private int $id;
        private string $name;
        private string $abbreviation;
        private array $options;
        private object $rules;

        public function __construct(int $id, string $name, string $abbreviation, array $options, object $rules) {
            $this->id = $id;
            $this->name = $name;
            $this->abbreviation = $abbreviation;
            $this->options = $options;
            $this->rules = $rules;
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

        public function getOptions(): array {
            return $this->options;
        }

        public function setOptions($options): void {
            $this->options = $options;
        }

        public function getRules(): object {
            return $this->rules;
        }

        public function setRules($rules): void {
            $this->rules = $rules;
        }
    }

?>
