<?php 
    namespace Controllers;

    use Services\ProdutoService;

    final class ProdutoController extends Controller{

        private ProdutoService $service;

        public function __construct() {
            $this->service = new ProdutoService();
            $this->view = new \Views\MainView('produto');
        }

        public function execute(): void {
            $produtoArray = $this->service->findAll();
            $this->view->render(['titulo'=>'Produtos', 'produtos'=>$produtoArray]);
        }
    }
?>
