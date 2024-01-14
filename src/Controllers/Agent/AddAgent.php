<?php

namespace Application\Controllers\Agent;

require_once("src/Models/Agent/Agent.php");
require_once("src/bdd/Database.php");
require_once("src/Interface/Controller/Controller.php");

use Application\bdd\DataBase;
use Application\Models\Agent\AgentRepository;
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
