<?php
namespace Application\Controllers\Agent;

require_once("src/Interface/Controller/Controller.php");
require_once("src/Models/Agent/Agent.php");
require_once("src/bdd/Database.php");

use Application\Models\Agent\AgentRepository;
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