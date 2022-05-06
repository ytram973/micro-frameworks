<?php

require_once "./../lib/controller/Controller.php";
require_once "./../src/repository/UserRepository.php";


class ConnexionController extends controller
{
    public function __construct()
    {
        parent::__construct("./../template/view/connexion.php");
    }

    public function index()
    {
        $responseType='';

        var_dump('fziej');
        if (isset($_POST["username"]) 
            && isset($_POST["password"])
            && strlen(trim($_POST["username"]))
            && strlen(trim($_POST["password"]))
            ){
                $responseType = "error";

            $userRepository = new UserRepository("user");

            $user = $userRepository->findOneByUsername($_POST["username"]);

            if (!empty($user ) && password_verify($_POST["password"] ,$user->getPassword()) ) {
                $_SESSION["user_is_connexion"]=true;
                $responseType ="success";
            }
        }
        $this->renderView(["responseType" => $responseType]);
    }
}
