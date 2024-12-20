<?php 
    namespace Services;

    use Repositories\ProdutoRepository;

    class ProdutoService {

        private ProdutoRepository $repository;

        public function __construct() {
            $this->repository = new ProdutoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
