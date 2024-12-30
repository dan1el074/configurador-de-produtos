<?php 
    namespace Services;

    use Entities\Acionamento;
    use Repositories\AcionamentoRepository;

    class AcionamentoService {

        private AcionamentoRepository $repository;

        public function __construct() {
            $this->repository = new AcionamentoRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

        public function findById(int $id): Acionamento {
            return $this->repository->findById($id);
        }

    }

?>
