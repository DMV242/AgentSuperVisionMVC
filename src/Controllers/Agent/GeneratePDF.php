<?php



namespace Application\Controllers\Agent;
require_once("src/Interface/Controller/Controller.php");
use Application\Interface\Controller\Controller;



class GeneratePDF implements Controller
{
    public function execute(): void
    {
            require_once("templates/GeneretePDF.php");
    }

}