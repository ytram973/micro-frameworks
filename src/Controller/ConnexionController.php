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
        if (condition) {
            # code...
            $_POST = [username, password];
            $userRepository = new UserRepository("connexion");
            $user = $userRepository->findOneByUsername($_POST["username"]);
            if ($user  &&  password_verify($_POST["password"] ,$user->getPassword()) ) {
                # code...
            }
        }
        $this->renderView(["user" => $user]);
    }
}
