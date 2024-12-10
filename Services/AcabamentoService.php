<?php 
    namespace Services;

    use Repositories\AcabamentoRepository;
    use Repositories\Repository;

    class AcabamentoService {

        private Repository $repository;

        public function __construct() {
            $this->repository = new AcabamentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
