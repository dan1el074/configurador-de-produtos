<?php 
    namespace Controllers;

    use Services\ProdutoService;
    use Views\popUpView;
    use Views\MainView;

    final class Step2Controller extends Controller{
        private ProdutoService $produtoService;

        public function __construct() {
            $this->produtoService = new ProdutoService();

            // if(isset($_POST['action'])) {
            //     $_SESSION["order"] = $_POST['order'];
            //     $_SESSION["product_id"] = $_POST['product_id'];
            //     $_SESSION["finish_id"] = $_POST['finish_id'];

            //     $this->view = new MainView('halfStep');
            //     return;
            // }
            
            // if(isset($_POST['halfStepAction'])) {
            //     $_SESSION["ruleName"] = $_POST['ruleName'];
            //     $_SESSION["ruleValue"] = $_POST['ruleSelect'];

            //     echo "<script>window.location.href='step2';</script>";
            //     exit;
            // }

            $this->view = new MainView('step2');
        }

        public function execute(): void {
            $productArray = $this->produtoService->findAll();
            $this->view->render(['titulo'=>'step-2','produtos'=>$productArray]);

            if(isset($_POST['action'])) {
                $this->nextStep($productArray);
            }
        }

        // public function nextStep(array $productArray): void {
        //     $productId = $_POST['product_id'];

        //     if(!$this->showPopUp($productArray, $productId)) {
        //         echo "<script>window.location.href='step2';</script>";
        //         exit;
        //     };
        // }

        // public function showPopUp(array $productArray, int $productId): bool {
        //     $find = false;
        //     foreach ($productArray as $key => $value) { 
        //         if ($value->getId() == $productId) {
        //             if(isset($value->getOptions()->rules)) {
        //                 $find = true;
        //                 $popUp = new popUpView();
        //                 $popUp->render($value->getOptions()->rules);
        //             }                    

        //             break;
        //         }
        //     }    
            
        //     return $find;
        // }
    }
?>
