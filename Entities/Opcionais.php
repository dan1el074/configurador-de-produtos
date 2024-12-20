<?php 
    namespace Entities;

    class Opcionais {
        private int $id;
        private string $name;
        private string $abbreviation;
        private object $rules;
        private bool $showInResult;

        public function __construct(int $id, string $name, string $abbreviation, object $rules, bool $showInResult) {
            $this->id = $id;
            $this->name = $name;
            $this->abbreviation = $abbreviation;
            $this->rules = $rules;
            $this->showInResult = $showInResult;
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

        public function getRules(): object {
            return $this->rules;
        }

        public function setRules($rules): void {
            $this->rules = $rules;
        }

        public function getShowInResult(): bool {
            return $this->showInResult;
        }

        public function setShowInResult($show): void {
            $this->showInResult = $show;
        }
    }
?>
