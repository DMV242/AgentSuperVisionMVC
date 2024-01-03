<?php

session_start();
require_once("src/controllers/accueilAdmin.php");
require_once("src/controllers/addAgent.php");
require_once ("src/controllers/deleteAgent.php");
require_once ("src/controllers/UpdateAgent.php");
require_once ("src/controllers/GeneratePDF.php");

if(empty($_SESSION)){
   require("src/connectionAdmin.php");
}
elseif (isset($_GET["action"]) && $_GET["action"]=== "addAgent"){
    (new addAgent)->execute();
}
elseif (isset($_GET["action"]) && $_GET["action"]==="delete" && isset($_GET["id"])){
    (new DeleteAgent)->execute();
}
elseif (isset($_GET["action"]) && $_GET["action"]==="update" && isset($_GET["id"])){

    (new UpdateAgent())->execute();
}
elseif (isset($_GET["action"]) && $_GET["action"]==="generate" && isset($_GET["id"])){

    (new GeneratePDF())->execute();
}
else{
    (new accueilAdmin)->execute();
}