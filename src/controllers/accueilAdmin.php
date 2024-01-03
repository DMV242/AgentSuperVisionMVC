<?php

require_once("src/model/Agent.php");
require_once ("src/bdd/bdd_connection.php");
require_once ("src/controllers/Controller.php");

class accueilAdmin implements Controller
{
    public function execute()
    {
        $agentRepository= new AgentRepository();
        $agentRepository->connection = new DataBase;
        $agents = $agentRepository->getAgents();
        require("templates/accueilAdmin.php");
    }
}