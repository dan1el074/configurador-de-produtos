<?php 
    namespace Services;

    use Repositories\Repository;
    use Repositories\ProductRepository;

    class ProductService {

        private Repository $repository;

        public function __construct() {
            $this->repository = new ProductRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
