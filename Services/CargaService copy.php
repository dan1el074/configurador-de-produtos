<?php 
    namespace Services;

    use Repositories\AcionamentoRepository;

    class AcionamentoService {

        private AcionamentoRepository $repository;

        public function __construct() {
            $this->repository = new AcionamentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
