<?php 
    namespace Services;

    use Repositories\LarguraRepository;

    class LarguraService {

        private LarguraRepository $repository;

        public function __construct() {
            $this->repository = new LarguraRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

    }

?>
