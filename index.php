<?php

session_start();

require_once("src/controllers/Admin/AccueilAdmin.php");
require_once("src/controllers/Agent/AddAgent.php");
require_once("src/controllers/Agent/DeleteAgent.php");
require_once("src/controllers/Agent/UpdateAgent.php");
require_once("src/controllers/Agent/GeneratePDF.php");


use Application\Controller\Agent\GeneratePDF;
use Application\Controller\Admin\AccueilAdmin;
use Application\Controller\Agent\UpdateAgent;
use Application\Controller\Agent\DeleteAgent;
use Application\Controller\Agent\AddAgent;


if(empty($_SESSION)){
   require("src/connectionAdmin.php");
}
elseif (isset($_GET["action"]) && $_GET["action"]=== "addAgent"){
    (new AddAgent)->execute();
}
elseif (isset($_GET["action"]) && $_GET["action"]==="delete" && isset($_GET["id"])){
    (new DeleteAgent)->execute();
}
elseif (isset($_GET["action"]) && $_GET["action"]==="update" && isset($_GET["id"])){

    (new UpdateAgent)->execute();
}
elseif (isset($_GET["action"]) && $_GET["action"]==="generate" && isset($_GET["id"])){

    (new GeneratePDF)->execute();
}
else{
    (new AccueilAdmin)->execute();
}