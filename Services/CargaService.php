<?php 
    namespace Services;

    use Repositories\CargaRepository;

    class CargaService {

        private CargaRepository $repository;

        public function __construct() {
            $this->repository = new CargaRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
