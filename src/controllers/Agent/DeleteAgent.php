<?php

namespace Application\Controller\Agent;

require_once("src/model/Agent.php");
require_once("src/bdd/bdd_connection.php");
require_once("src/controllers/Controller.php");

use Application\model\classAgent\AgentRepository;
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


