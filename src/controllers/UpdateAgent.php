<?php

require_once("src/model/Agent.php");
require_once ("src/bdd/bdd_connection.php");

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