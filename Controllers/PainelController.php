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
    use Views\popUpView;

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
            $this->unsetItens();

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
            if(isset($_POST['newItem'])) {
                $path = INCLUDE_PATH;
                header("Location:{$path}create?type={$_POST['newItem']}");
                return;
            }

            if(isset($_POST['edit'])) {
                print_r($_POST);
                die();
            }

            $this->view = new MainView('cPanel','cPanelHeader');

            if(isset($_POST['delete'])) {
                $arr = explode(',',$_POST['delete']);

                switch($arr[0]){
                    case 'product';
                        $currentObject = $this->produtoService->findById($arr[1]);
                        break;
                    case "finish";
                        $currentObject = $this->acabamentoService->findById($arr[1]);
                        break;
                    case "weight";
                        $currentObject = $this->cargaService->findById($arr[1]);
                        break;
                    case "length";
                        $currentObject = $this->comprimentoService->findById($arr[1]);
                        break;
                    case "width";
                        $currentObject = $this->larguraService->findById($arr[1]);
                        break;
                    case "drive";
                        $currentObject = $this->acionamentoService->findById($arr[1]);
                        break;
                    case "optionals";
                        $currentObject = $this->opcionaisService->findById($arr[1]);
                        break;
                }

                $popUp = new popUpView('deletePopUp');
                $popUp->render($currentObject);
            }

            if(isset($_POST['confirmDelete'])) {
                $arr = explode(',',$_POST['confirmDelete']);
 

                switch($arr[0]){
                    case "EntitiesProduto";
                        $this->produtoService->delete($arr[1]);
                        $route = 'product';
                        break;
                    case "EntitiesAcabamento";
                        $this->acabamentoService->delete($arr[1]);
                        $route = 'finish';
                        break;
                    case "EntitiesCarga";
                        $this->cargaService->delete($arr[1]);
                        $route = 'weight';
                        break;
                    case "EntitiesComprimento";
                        $this->comprimentoService->delete($arr[1]);
                        $route = 'length';
                        break;
                    case "EntitiesLargura";
                        $this->larguraService->delete($arr[1]);
                        $route = 'width';
                        break;
                    case "EntitiesAcionamento";
                        $this->acionamentoService->delete($arr[1]);
                        $route = 'drive';
                        break;
                    case "EntitiesOpcionais";
                        $this->opcionaisService->delete($arr[1]);
                        $route = 'optionals';
                        break;
                }
                
                header('Location:'.INCLUDE_PATH.'painel?type='.$route);
            }
        }

        public function execute(): void {
            $product = $this->produtoService->findAll();
            $finish = $this->acabamentoService->findAll();
            $weight = $this->cargaService->findAll();
            $length = $this->comprimentoService->findAll();
            $width = $this->larguraService->findAll();
            $drive = $this->acionamentoService->findAll();
            $opcionals = $this->opcionaisService->findAll();

            $this->view->render([
                'title'=>'Painel', 
                'product'=>$product, 
                'finish'=>$finish, 
                'weight'=>$weight,
                'length'=>$length,
                'width'=>$width,
                'drive'=>$drive,
                'optionals'=>$opcionals
            ]);
        }

        public function unsetItens(): void {
            $arr = ['order', 'product_id', 'finish_id', 'finish_especial', 'productRules','weight_id','length_id','width_id','drive_id','driveRules','optionalsId','optionalRules'];
            foreach($arr as $value) {
                if(isset($_SESSION[$value])) {
                    unset($_SESSION[$value]);
                }
            }
        }
    }
?>
