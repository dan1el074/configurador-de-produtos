<?php 
    namespace Controllers;

    use Services\AcabamentoService;
    use Services\ProdutoService;
    use Views\popUpView;
    use \Views\MainView;

    final class HomeController extends Controller{
        private ProdutoService $produtoService;
        private AcabamentoService $acabamentoService;

        public function __construct() {
            $this->produtoService = new ProdutoService();
            $this->acabamentoService = new AcabamentoService();
            $this->view = new MainView('home');
        }

        public function execute(): void {
            $productArray = $this->produtoService->findAll();
            $finishArray = $this->acabamentoService->findAll();
            $this->view->render(['titulo'=>'home','produtos'=>$productArray,'acabamentos'=>$finishArray]);

            if(isset($_POST['action'])) {
                $this->nextStep($productArray);
            }
        }

        public function nextStep(array $productArray): void {
            $productId = $_POST['product'];

            $this->showPopUp($productArray, $productId);
        }

        public function showPopUp(array $productArray, int $productId): void {
            foreach ($productArray as $key => $value) { 
                if ($value->getId() == $productId) {
                    if(isset($value->getOptions()->rules)) {
                        $popUp = new popUpView();
                        $popUp->render($value->getOptions()->rules);
                    }                    

                    break;
                }
            }    
            
            return;
        }
    }
?>
