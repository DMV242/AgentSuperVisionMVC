<?php


namespace Application\Controller\Admin;

require_once("src/controllers/Controller.php");
require_once("src/model/Agent.php");
require_once("src/bdd/bdd_connection.php");

use Application\model\classAgent\AgentRepository;
use  Application\bdd\DataBase;
use Application\Interface\Controller\Controller;

class AccueilAdmin implements Controller
{
    public function execute(): void
    {
        $agentRepository= new AgentRepository();
        $agentRepository->connection = new DataBase;
        $agents = $agentRepository->getAgents();
        require("templates/accueilAdmin.php");
    }
}