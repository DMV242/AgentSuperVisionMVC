<?php
namespace Application\Controller;
use Application\model\classAgent\AgentRepository;
use  Application\bdd\DataBase;
use Application\Interface\Controller\Controller;

class UpdateAgent implements Controller
{

        public function execute()
    {
        $agentRepository= new AgentRepository();
        $agentRepository->connection = new DataBase;
        if ($_GET["view"] === "no"){
            $agentRepository->updateAgent($_GET["id"]);
            header("location:index.php");
        }else{
            $agent = $agentRepository->getAgent($_GET["id"]);
            require_once("templates/UpdateAgent.php");
        }

    }

}