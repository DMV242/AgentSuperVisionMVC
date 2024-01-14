<?php

namespace Application\Controllers\Agent;

require_once("src/Models/Agent/Agent.php");
require_once("src/bdd/Database.php");
require_once("src/Interface/Controller/Controller.php");

use Application\Models\Agent\AgentRepository;
use  Application\bdd\DataBase;
use Application\Interface\Controller\Controller;


class DeleteAgent implements Controller
{
        public function execute(): void
        {
            $agentRepository= new AgentRepository();
            $agentRepository->connection = new DataBase;
            if ($_GET["view"] === "no"){
                $agentRepository->deleteAgent($_GET["id"]);
                header("location:index.php");
            }else{
                $agent = $agentRepository->getAgent($_GET["id"]);
                require_once("templates/DeleteAgent.php");
            }

        }
}


