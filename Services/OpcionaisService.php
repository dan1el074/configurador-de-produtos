<?php 
    namespace Services;

    use Repositories\OpcionaisRepository;

    class OpcionaisService {

        private OpcionaisRepository $repository;

        public function __construct() {
            $this->repository = new OpcionaisRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
