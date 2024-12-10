<?php 
    namespace Services;

    use Repositories\Repository;
    use Repositories\ProdutoRepository;

    class ProdutoService {

        private Repository $repository;

        public function __construct() {
            $this->repository = new ProdutoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
