<?php

session_start();

require_once("src/Controllers/Admin/AccueilAdmin.php");
require_once("src/Controllers/Admin/LogIn.php");
require_once("src/Controllers/Admin/LogOut.php");
require_once("src/Controllers/Agent/AddAgent.php");
require_once("src/Controllers/Agent/DeleteAgent.php");
require_once("src/Controllers/Agent/UpdateAgent.php");
require_once("src/Controllers/Agent/GeneratePDF.php");


use Application\Controllers\Admin\AccueilAdmin;
use Application\Controllers\Admin\LogIn;
use Application\Controllers\Admin\LogOut;
use Application\Controllers\Agent\DeleteAgent;
use Application\Controllers\Agent\GeneratePDF;
use Application\Controllers\Agent\UpdateAgent;
use Application\Controllers\Agent\AddAgent;


if(empty($_SESSION) and !isset($_GET["action"])){
   require("templates/connectionAdmin.php");
}
elseif (isset($_GET["action"]) && $_GET["action"]==="connection"){

    (new LogIn)->execute();

}elseif (isset($_GET["action"]) && $_GET["action"]==="deconnection" ){

    (new LogOut)->execute();
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