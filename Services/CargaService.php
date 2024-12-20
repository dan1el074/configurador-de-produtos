<?php 
    namespace Services;

    use Entities\Carga;
    use Repositories\CargaRepository;

    class CargaService {

        private CargaRepository $repository;

        public function __construct() {
            $this->repository = new CargaRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

        public function findById(int $id): Carga {
            return $this->repository->findById($id);
        }

    }

?>
