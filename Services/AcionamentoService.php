<?php 
    namespace Services;

    use Repositories\AcionamentoRepository;
    use Repositories\Repository;

    class AcionamentoService {

        private Repository $repository;

        public function __construct() {
            $this->repository = new AcionamentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
