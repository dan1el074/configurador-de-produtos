<?php 
    namespace Services;

    use Repositories\ComprimentoRepository;

    class ComprimentoService {

        private ComprimentoRepository $repository;

        public function __construct() {
            $this->repository = new ComprimentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
