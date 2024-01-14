<?php

namespace Application\Controllers\Admin;


require_once("src/Interface/Controller/Controller.php");

use Application\Interface\Controller\Controller;
use Application\Models\Admin\AdminRepository;
class LogOut implements Controller
{

     public function execute(): void
    {
        $adminRepository = new AdminRepository();
        $adminRepository->deconnection();

       header("location:index.php");
    }
}