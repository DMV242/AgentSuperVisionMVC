<?php
session_start();
use  Application\bdd\DataBase;
require ("../../bdd/bdd_connection.php");



function checkInput($field){
    $field = htmlspecialchars($field);
    return trim($field);
}

if(isset($_POST["name"]) && isset($_POST["pass"]) ){
    $name = checkInput( $_POST["name"]);
    $pass = checkInput( $_POST["pass"]);

    $db = DataBase::connect();
    $requete = $db->prepare("SELECT * FROM admin WHERE nom=? AND mot_de_passe=?");
    $requete->execute(array($name,$pass));


    if($requete->rowCount() == 1){
        $_SESSION["nom"] = $name; 
        header("location:../../../");

    }else{
        header("location:../../..");

    }
    exit(0);

}else{
    header("location:../..");
    exit(0);
}

