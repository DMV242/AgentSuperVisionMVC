<?php
namespace Application\Models\Admin;
use Application\bdd\DataBase;
require_once("src/lib/cleanData.php");
class Admin
{
    private String $name;
    private String $pass;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }

}

class AdminRepository
{

    public Database $connection ;


    public function connectionAdmin(array $input):bool{

        if(isset($input["name"]) && isset($input["pass"]) ){
            $name = cleanData($input["name"]);
            $pass = cleanData($input["pass"]);
            $requete = $this->connection::connect()->prepare("SELECT * FROM admin WHERE nom=? AND mot_de_passe=?");
            $requete->execute(array($name,$pass));
            if($requete->rowCount() == 1){
                $_SESSION["nom"] = $name;
                return true;
            }else{
               return false;
            }


        }else{
          return false;
        }

    }


    public function deconnection():void
    {
        $_SESSION = array();
        session_unset();
        session_destroy();
    }
}
