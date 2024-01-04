<?php


namespace Application\Controller;
use Application\model\classAgent\AgentRepository;
use  Application\bdd\DataBase;
use Application\Interface\Controller\Controller;

class AccueilAdmin implements Controller
{
    public function execute()
    {
        $agentRepository= new AgentRepository();
        $agentRepository->connection = new DataBase;
        $agents = $agentRepository->getAgents();
        require("templates/accueilAdmin.php");
    }
}