<?php 
    namespace Controllers;

    use Services\ProductService;

    final class ProductController extends Controller{

        private ProductService $service;

        public function __construct() {
            $this->service = new ProductService();
            $this->view = new \Views\MainView('product');
        }

        public function execute(): void {
            $productArray = $this->service->findAll();
            $this->view->render(['titulo'=>'Produtos', 'products'=>$productArray]);
        }
    }
?>
