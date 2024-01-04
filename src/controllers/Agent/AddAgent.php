<?php

namespace Application\Controller\Agent;

require_once("src/model/Agent.php");
require_once("src/bdd/Database.php");
require_once("src/controllers/Controller.php");
use Application\model\classAgent\AgentRepository;
use  Application\bdd\DataBase;
use Application\Interface\Controller\Controller;

class AddAgent implements Controller
{
    public function execute(): void
    {
        $agentRepository= new AgentRepository();
        $agentRepository->connection = new DataBase;
        $agentRepository->createAgent($_POST,$_FILES);
        header("location:index.php");
    }
}
