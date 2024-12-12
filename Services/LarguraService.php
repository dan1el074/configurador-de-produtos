<?php 
    namespace Services;

    use Repositories\LarguraRepository;
    use Repositories\Repository;

    class LarguraService {

        private Repository $repository;

        public function __construct() {
            $this->repository = new LarguraRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
