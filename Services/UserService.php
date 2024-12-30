<?php 
    namespace Services;

    use Entities\User;
    use Repositories\UserRepository;

    class UserService {

        private UserRepository $repository;

        public function __construct() {
            $this->repository = new UserRepository();
        }

        public function login(string $name, string $password): User | null {
            return $this->repository->login($name, $password);
        }
    }
?>
