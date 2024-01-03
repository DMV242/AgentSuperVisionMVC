<?php

require_once("src/model/Agent.php");
require_once ("src/bdd/bdd_connection.php");
class addAgent implements Controller
{
    public function execute()
    {
        $agentRepository= new AgentRepository();
        $agentRepository->connection = new DataBase;
        $agentRepository->createAgent();
        header("location:index.php");
    }
}
