<?php 
    namespace Services;

    use Entities\Comprimento;
    use Repositories\ComprimentoRepository;

    class ComprimentoService {

        private ComprimentoRepository $repository;

        public function __construct() {
            $this->repository = new ComprimentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

        public function findById(int $id): Comprimento {
            return $this->repository->findById($id);
        }

    }

?>
