<?php 
    namespace Controllers;

use Services\AcabamentoService;
use Services\ProdutoService;

    final class HomeController extends Controller{
        private ProdutoService $produtoService;
        private AcabamentoService $acabamentoService;

        public function __construct() {
            $this->produtoService = new ProdutoService();
            $this->acabamentoService = new AcabamentoService();
            $this->view = new \Views\MainView('home');
        }

        public function execute(): void {
            $produtoArray = $this->produtoService->findAll();
            $acabamentoarray = $this->acabamentoService->findAll();
            $this->view->render(['titulo'=>'home','produtos'=>$produtoArray,'acabamentos'=>$acabamentoarray]);

            if(isset($_POST['order'])) {
                $this->step2();
            }
        }

        public function step2(): void {
            //TODO: tratar elementos antes de ir para step2
        }
    }
?>
