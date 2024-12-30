<?php 
    namespace Controllers;

use Services\AcabamentoService;
use Services\AcionamentoService;
use Services\CargaService;
use Services\ComprimentoService;
use Services\LarguraService;
use Services\OpcionaisService;
use Services\ProdutoService;
    use Views\MainView;

    final class PainelController extends Controller{
        private ProdutoService $produtoService;
        private AcabamentoService $acabamentoService;
        private CargaService $cargaService;
        private ComprimentoService $comprimentoService;
        private LarguraService $larguraService;
        private AcionamentoService $acionamentoService;
        private OpcionaisService $opcionaisService;

        public function __construct() {
            session_start();
            
            $path = INCLUDE_PATH;
            if(!isset($_SESSION['user'])){
                header("Location:{$path}/login");
            }

            $this->produtoService = new ProdutoService();
            $this->acabamentoService = new AcabamentoService();
            $this->cargaService = new CargaService();
            $this->comprimentoService = new ComprimentoService();
            $this->larguraService = new LarguraService();
            $this->acionamentoService = new AcionamentoService();
            $this->opcionaisService = new OpcionaisService();

            $this->init();
        }

        public function init(): void {
            $this->view = new MainView('cPanel','cPanelHeader');
        }

        public function execute(): void {
            $products = $this->produtoService->findAll();
            $finish = $this->acabamentoService->findAll();
            $weight = $this->cargaService->findAll();
            $length = $this->comprimentoService->findAll();
            $width = $this->larguraService->findAll();
            $drive = $this->acionamentoService->findAll();
            $opcionals = $this->opcionaisService->findAll();

            $this->view->render([
                'titulo'=>'Painel', 
                'products'=>$products, 
                'finish'=>$finish, 
                'weight'=>$weight,
                'length'=>$length,
                'width'=>$width,
                'drive'=>$drive,
                'optionals'=>$opcionals
            ]);
        }
    }
?>
