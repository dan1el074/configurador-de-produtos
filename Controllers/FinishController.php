<?php 
    namespace Controllers;

use Entities\Acabamento;
use Services\AcabamentoService;
    use Services\AcionamentoService;
    use Services\CargaService;
    use Services\ComprimentoService;
    use Services\LarguraService;
    use Services\OpcionaisService;
    use Services\ProdutoService;

    final class FinishController extends Controller{
        private ProdutoService $produtoService;
        private AcabamentoService $acabamentoService;
        private CargaService $cargaService;
        private ComprimentoService $comprimentoService;
        private LarguraService $larguraService;
        private AcionamentoService $acionamentoService;
        private OpcionaisService $opcionaisService;

        public function __construct() {
            session_start();
            $this->view = new \Views\MainView('finish');
            $this->produtoService = new ProdutoService();
            $this->acabamentoService = new AcabamentoService();
            $this->cargaService = new CargaService();
            $this->comprimentoService = new ComprimentoService();
            $this->larguraService = new LarguraService();
            $this->acionamentoService = new AcionamentoService();
            $this->opcionaisService = new OpcionaisService();

            if (!isset($_SESSION["weight_id"]) || !isset($_SESSION["length_id"]) || !isset($_SESSION["width_id"]) || !isset($_SESSION["drive_id"])) {
                echo "<script>window.location.href='step3';</script>";
                exit;
            }
        }

        public function execute(): void {
            $product = $this->produtoService->findById($_SESSION['product_id']);
            $weight = $this->cargaService->findById($_SESSION['weight_id']);
            $length = $this->comprimentoService->findById($_SESSION['length_id']);
            $width = $this->larguraService->findById($_SESSION['width_id']);
            $drive = $this->acionamentoService->findById($_SESSION['drive_id']);
            $opcionals = $this->opcionaisService->findByIds($_SESSION['optionalsId']);

            if(isset($_SESSION['finish_id'])) {
                $finish = $this->acabamentoService->findById($_SESSION['finish_id']);
            } else {
                $finish = new Acabamento(999, "Especial", $_SESSION['finish_especial']);
            }

            $optionalsAbbreviation = "";
            if(isset($opcionals)) {
                foreach($opcionals as $optional) {
                    if($optional->getShowInResult()) {
                        $optionalsAbbreviation .= " {$optional->getAbbreviation()}";
                    }
                }
            }

            $abbreviationResult = "
                {$product->getAbbreviation()}
                - MT
                {$weight->getAbbreviation()}{$length->getAbbreviation()}{$width->getAbbreviation()}
                {$drive->getAbbreviation()}
                {$optionalsAbbreviation}
                P{$_SESSION['order']}
            "; 

            $this->view->render([
                'titulo'=>'Finish', 
                'product'=>$product, 
                'finish'=>$finish, 
                'weight'=>$weight,
                'length'=>$length,
                'width'=>$width,
                'drive'=>$drive,
                'optionals'=>$opcionals,
                'abreviation'=>$abbreviationResult
            ]);
        }
    }
?>
