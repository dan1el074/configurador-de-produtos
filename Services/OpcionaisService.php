<?php 
    namespace Services;

use Entities\Opcionais;
use Repositories\OpcionaisRepository;

    class OpcionaisService {

        private OpcionaisRepository $repository;

        public function __construct() {
            $this->repository = new OpcionaisRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

        public function findByIds(array $ids): array {
            return $this->repository->findByIds($ids);
        }

        public function findById(int $id): Opcionais {
            return $this->repository->findById($id);
        }

        public function delete(int $id): void {
            $this->repository->delete($id);
        }

    }

?>
