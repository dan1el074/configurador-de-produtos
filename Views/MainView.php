<?php 
    namespace Views;

    class MainView {
        private string $fileName;
        private string $headerFile;
        private string $footerFile;
        private array $menuItems;

        public function __construct(string $fileName, string $headerFile = 'header', string $footerFile = 'footer') {
            $this->fileName = $fileName;
            $this->headerFile = $headerFile;
            $this->footerFile = $footerFile;
            $this->menuItems = ['home', 'product'];
        }
        public function render(array $atributes = []): void {
            include('pages/templates/'.$this->headerFile.'.php');
            include('pages/'.$this->fileName.'.php');
            include('pages/templates/'.$this->footerFile.'.php');
        }
    }

?>
