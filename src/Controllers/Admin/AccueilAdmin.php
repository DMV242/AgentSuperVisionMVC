<?php


namespace Application\Controllers\Admin;

require_once("src/Interface/Controller/Controller.php");
require_once("src/Models/Agent/Agent.php");
require_once("src/bdd/Database.php");

use Application\Models\Agent\AgentRepository;
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