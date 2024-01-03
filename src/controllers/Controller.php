<?php

require_once("src/model/Agent.php");
require_once ("src/bdd/bdd_connection.php");
interface Controller
{
   public function execute();
}