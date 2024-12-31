<?php 
    namespace Views;

    class popUpView {
        private string $popUp;

        public function __construct(string $popUp = 'popUp') {
            $this->popUp = $popUp;
        }
        
        public function render(object $object): void {
            include('pages/popUp/'.$this->popUp.'.php');
        }

        public function renderWithArray(array $arrayOptionals): void {
            include('pages/popUp/'.$this->popUp.'.php');
        }
    }

?>
