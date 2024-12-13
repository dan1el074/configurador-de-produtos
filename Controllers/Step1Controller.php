<?php 
    namespace Controllers;

    use Services\ProdutoService;
    use Services\AcabamentoService;
    use Views\popUpView;
    use Views\MainView;

    final class Step1Controller extends Controller{
        private ProdutoService $produtoService;
        private AcabamentoService $acabamentoService;

        public function __construct() {
            session_start();
            $this->produtoService = new ProdutoService();
            $this->acabamentoService = new AcabamentoService();

            if(isset($_POST['action'])) {
                $_SESSION["order"] = $_POST['order'];
                $_SESSION["product_id"] = $_POST['product_id'];
                $_SESSION["finish_id"] = $_POST['finish_id'];
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

            $this->view = new MainView('halfStep');
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
                    if(count(get_object_vars($product->getRules()))) {
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
