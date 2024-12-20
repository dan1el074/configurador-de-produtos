<?php 
    namespace Services;

    use Repositories\AcabamentoRepository;

    class AcabamentoService {

        private AcabamentoRepository $repository;

        public function __construct() {
            $this->repository = new AcabamentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
