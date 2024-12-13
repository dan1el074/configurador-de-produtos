<?php 
    namespace Controllers;

    use Services\ProdutoService;
    use Services\AcabamentoService;
    use Views\popUpView;
    use Views\MainView;

    final class HomeController extends Controller{
        private ProdutoService $produtoService;
        private AcabamentoService $acabamentoService;

        public function __construct() {
            $this->produtoService = new ProdutoService();
            $this->acabamentoService = new AcabamentoService();

            if(isset($_POST['action'])) {
                $_SESSION["order"] = $_POST['order'];
                $_SESSION["product_id"] = $_POST['product_id'];
                $_SESSION["finish_id"] = $_POST['finish_id'];

                $this->view = new MainView('halfStep');
                return;
            }
            
            if(isset($_POST['halfStepAction'])) {
                array_pop($_POST);
                $rulesResult = [];

                foreach($_POST as $key=>$value) {
                    $rulesResult[] = explode(",", $value);
                }

                $_SESSION['productRules'] = $rulesResult;

                echo "<script>window.location.href='step2';</script>";
                exit;
            }

            session_unset();
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
            $productId = $_POST['product_id'];

            if(!$this->showPopUp($productArray, $productId)) {
                echo "<script>window.location.href='step2';</script>";
                exit;
            };
        }

        public function showPopUp(array $productArray, int $productId): bool {
            $find = false;
            foreach ($productArray as $key => $product) { 
                if ($product->getId() == $productId) {
                    if(isset($product->getOptions()->rules)) {
                        $find = true;
                        $popUp = new popUpView();
                        $popUp->render($product);
                    }                    

                    break;
                }
            }    
            
            return $find;
        }
    }
?>
