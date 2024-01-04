<?php

namespace Application\Controller;
use Application\model\classAgent\AgentRepository;
use  Application\bdd\DataBase;
use Application\Interface\Controller\Controller;

class AddAgent implements Controller
{
    public function execute()
    {
        $agentRepository= new AgentRepository();
        $agentRepository->connection = new DataBase;
        $agentRepository->createAgent();
        header("location:index.php");
    }
}
