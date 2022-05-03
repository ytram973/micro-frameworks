<?php

require_once ".././lib/controller/Controller.php";
require_once "./../Model/UserRepository.php";


class ConnexionController extends controller
{
    public function __construct()
    {
        parent::__construct("./../template/view/connexion.php");
    }

    public function index()
    {
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $userRepository = new UserRepository("user");
            $user = $userRepository->findOneByUsername($_POST["username"]);
            if (empty($user ) && password_verify($_POST["password"] ,$user->getPassword()) ) {
                
            }
        }
        $this->renderView(["user" => $user]);
    }
}
