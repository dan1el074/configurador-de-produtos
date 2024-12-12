<?php 
    namespace Services;

    use Repositories\CargaRepository;
    use Repositories\Repository;

    class CargaService {

        private Repository $repository;

        public function __construct() {
            $this->repository = new CargaRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
