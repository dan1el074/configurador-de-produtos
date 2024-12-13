<?php 
    namespace Controllers;

    use Services\OpcionaisService;
    use Services\ProdutoService;
    use Views\popUpView;
    use Views\MainView;

    final class Step3Controller extends Controller{
        private ProdutoService $produtoService;
        private OpcionaisService $opcionaisService;

        public function __construct() {
            $this->produtoService = new ProdutoService();
            $this->opcionaisService = new OpcionaisService();

            if(isset($_POST['action'])) {
                $newArray = [... $_POST];
                array_pop($newArray);
                $optionalsId = array_values(array_map('intval', $newArray));
                $_SESSION['optionalsId'] = $optionalsId;

                $this->view = new MainView('halfStep3');
                return;
            }
            
            $this->view = new MainView('step3');
        }

        public function execute(): void {
            $productArray = $this->produtoService->findAll();
            $opcionaisArray = $this->opcionaisService->findAll();

            $product_id = $_SESSION["product_id"];
            $index = "";

            foreach ($productArray as $key => $product) {
                if($product->getId() == $product_id) {
                    $index = $key;
                }
            }

            $optionsArray = $productArray[$index]->getOptions();
            $opcionaisArrayFiltered = [];

            foreach($optionsArray as $key => $value) {
                foreach($opcionaisArray as $key => $value2) {
                    if($value2->getId() == $value) {
                        $opcionaisArrayFiltered[] = $value2;
                    }
                }
            }

            $this->view->render(['titulo'=>'step-2','produtos'=>$productArray, 'opcionais'=>$opcionaisArrayFiltered]);

            if(isset($_POST['action'])) {
                array_pop($_POST);
                $optionalsId = array_values(array_map('intval', $_POST));
                
                $this->nextStep($opcionaisArrayFiltered, $optionalsId);
            }       
            
            if(isset($_POST['halfStepAction'])) {
                array_pop($_POST);

                $_POST = array_map(function($rule) {
                    return explode(",", $rule);
                }, $_POST);

                $newPOST = [];

                foreach ($_POST as $key => $value) {
                    preg_match('/ruleSelected-(\d+)-\d+/', $key, $matches);
                    $groupIndex = $matches[1];
                    
                    $newPOST[$groupIndex][] = $value;
                }

                ksort($newPOST);
                $_SESSION['optionalRules'] = $newPOST;
                
                echo "<script>window.location.href='finish';</script>";
                exit;
            }       
        }
        
        public function nextStep(array $opcionaisArrayFiltered, $optionalsId): void {
            if(!$this->showPopUp($opcionaisArrayFiltered, $optionalsId)) {
                echo "<script>window.location.href='finish';</script>";
                exit;
            };
        }
        
        public function showPopUp(array $opcionaisArray, array $resultsId): bool {
            $find = false;
            $optionals = [];

            foreach ($opcionaisArray as $key => $opcional) { 
                foreach ($resultsId as $resultId) {
                    if ($opcional->getId() == $resultId) {
                        if($opcional->getRules() !== null) {
                            $find = true;
                            $optionals[] = $opcional;
                        }                    
                        
                        break;
                    }
                }
            }

            if($find) {
                $popUp = new popUpView('popUp2');
                $popUp->renderWithArray($optionals);
            }

            return $find;
        }
    }
?>
