<?php 
    namespace Services;

    use Repositories\Repository;
    use Repositories\OpcionaisRepository;

    class OpcionaisService {

        private Repository $repository;

        public function __construct() {
            $this->repository = new OpcionaisRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
