<?php 
    namespace Entities;

    class Acionamento {
        private int $id;
        private string $name;
        private string $abbreviation;
        private object $rules;

        public function __construct(int $id, string $name, string $abbreviation, object $rules) {
            $this->id = $id;
            $this->name = $name;
            $this->abbreviation = $abbreviation;
            $this->rules = $rules;
        }

        public function getId(): string {
            return $this->id;
        }

        public function getName(): string {
            return $this->name;
        }

        public function setName(string $name): void {
            $this->name = $name;
        }

        public function getAbbreviation(): string {
            return $this->abbreviation;
        }

        public function setAbbreviation(string $abbreviation): void {
            $this->abbreviation = $abbreviation;
        }

        public function getRules(): object {
            return $this->rules;
        }

        public function setRules(object $rules): void {
            $this->rules = $rules;
        }

    }

?>
