<?php 
    namespace Services;

    use Entities\Produto;
    use Repositories\ProdutoRepository;

    class ProdutoService {

        private ProdutoRepository $repository;

        public function __construct() {
            $this->repository = new ProdutoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

        public function findById(int $id): Produto {
            return $this->repository->findById($id);
        }

        public function delete(int $id): void {
            $this->repository->delete($id);
        }

    }

?>
