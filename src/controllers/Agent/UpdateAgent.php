<?php
namespace Application\Controller\Agent;

require_once("src/controllers/Controller.php");
require_once("src/model/Agent.php");
require_once("src/bdd/bdd_connection.php");

use Application\model\classAgent\AgentRepository;
use  Application\bdd\DataBase;
use Application\Interface\Controller\Controller;

class UpdateAgent implements Controller
{

        public function execute(): void
        {
        $agentRepository= new AgentRepository();
        $agentRepository->connection = new DataBase;
        if ($_GET["view"] === "no"){
            $agentRepository->updateAgent($_POST,$_GET["id"],$_FILES);
            header("location:index.php");
        }else{
            $agent = $agentRepository->getAgent($_GET["id"]);
            require_once("templates/UpdateAgent.php");
        }

    }

}