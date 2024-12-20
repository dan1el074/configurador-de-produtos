<?php

    namespace Services;

    use Entities\Acabamento;
    use Repositories\AcabamentoRepository;

    class AcabamentoService {

        private AcabamentoRepository $repository;

        public function __construct() {
            $this->repository = new AcabamentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

        public function findById(int $id): Acabamento {
            return $this->repository->findById($id);
        }
    }

?>
