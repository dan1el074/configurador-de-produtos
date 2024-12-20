<?php 
    namespace Services;

    use Entities\Largura;
    use Repositories\LarguraRepository;

    class LarguraService {

        private LarguraRepository $repository;

        public function __construct() {
            $this->repository = new LarguraRepository();
        }

        public function findAll(): array {
            return $this->repository->findAll();
        }

        public function findById(int $id): Largura {
            return $this->repository->findById($id);
        }

    }

?>
