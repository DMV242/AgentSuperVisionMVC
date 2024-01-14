<?php

namespace Application\Controllers\Admin;
require_once('src/Models/Admin/Admin.php');
require_once("src/bdd/Database.php");
require_once("src/Interface/Controller/Controller.php");

use Application\bdd\DataBase;
use Application\Interface\Controller\Controller;
use Application\Models\Admin\AdminRepository;

class LogIn implements Controller
{


   public function execute(): void
    {
        $adminRepository = new AdminRepository();
        $adminRepository->connection = new DataBase;
        $succes = $adminRepository->connectionAdmin($_POST);
        if($succes){

          header("location:index.php");
        }
        else{

           $error = "informations invalides";
           require_once("templates/connectionAdmin.php");
        }


    }
}