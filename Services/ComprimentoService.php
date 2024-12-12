<?php 
    namespace Services;

    use Repositories\ComprimentoRepository;
    use Repositories\Repository;

    class ComprimentoService {

        private Repository $repository;

        public function __construct() {
            $this->repository = new ComprimentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
