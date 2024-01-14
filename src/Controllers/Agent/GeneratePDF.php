<?php



namespace Application\Controller\Agent;
require_once("src/controllers/Controller.php");
use Application\Interface\Controller\Controller;



class GeneratePDF implements Controller
{
    public function execute(): void
    {
            require_once("templates/GeneretePDF.php");
    }

}