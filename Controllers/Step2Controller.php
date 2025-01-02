<?php 
    namespace Controllers;

    use Services\AcionamentoService;
    use Services\CargaService;
    use Services\ComprimentoService;
    use Services\LarguraService;
    use Services\ProdutoService;
    use Views\popUpView;
    use Views\MainView;

    final class Step2Controller extends Controller{
        private ProdutoService $produtoService;
        private CargaService $cargaService;
        private ComprimentoService $comprimentoService;
        private LarguraService $larguraService;
        private AcionamentoService $acionamentoService;

        public function __construct() {
            session_start();
            $this->produtoService = new ProdutoService();
            $this->cargaService = new CargaService();
            $this->comprimentoService = new ComprimentoService();
            $this->larguraService = new LarguraService();
            $this->acionamentoService = new AcionamentoService();
            $this->init();
            $this->view = new MainView('step2');
        }

        public function init(): void {
            if (!isset($_SESSION["order"]) || !isset($_SESSION["product_id"])) {
                echo "<script>window.location.href='step1';</script>";
                exit;
            }

            if(isset($_POST['action'])) {
                $_SESSION["weight_id"] = $_POST['weight_id'];
                $_SESSION["length_id"] = $_POST['length_id'];
                $_SESSION["width_id"] = $_POST['width_id'];
                $_SESSION["drive_id"] = $_POST['drive_id'];
            }
        }

        public function execute(): void {
            $productArray = $this->produtoService->findAll();
            $cargaArray = $this->cargaService->findAll();
            $comprimentoArray = $this->comprimentoService->findAll();
            $larguraArray = $this->larguraService->findAll();
            $acionamentoArray = $this->acionamentoService->findAll();
            $this->view->render(['title'=>'Passo 2','produtos'=>$productArray, 'carga'=>$cargaArray, 'comprimento'=>$comprimentoArray, 'largura'=>$larguraArray, 'acionamento'=>$acionamentoArray]);

            if(isset($_POST['action'])) {
                if(isset($_SESSION['driveRules'])) {
                    unset($_SESSION['driveRules']);
                }

                $this->nextStep($acionamentoArray);
            }
            
            if(isset($_POST['halfStepAction'])) {
                array_pop($_POST);
                $rulesResult = [];

                foreach($_POST as $key=>$value) {
                    $rulesResult[] = explode(",", $value);
                }

                $_SESSION['driveRules'] = $rulesResult;

                echo "<script>window.location.href='step3';</script>";
                exit;
            }
        }

        public function nextStep(array $acionamentoArray): void {
            $driveId = $_POST['drive_id'];

            if(!$this->showPopUp($acionamentoArray, $driveId)) {
                echo "<script>window.location.href='step3';</script>";
                exit;
            };
        }

        public function showPopUp(array $acionamentoArray, int $driveId): bool {
            $find = false;
            foreach ($acionamentoArray as $key => $acionamento) { 
                if ($acionamento->getId() == $driveId) {
                    if(count(get_object_vars($acionamento->getRules()))) {
                        $find = true;
                        $popUp = new popUpView();
                        $popUp->render($acionamento);
                    }                    

                    break;
                }
            }    
            
            return $find;
        }
    }
?>
