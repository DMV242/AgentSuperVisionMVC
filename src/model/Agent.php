<?php

namespace Application\model\classAgent;

require_once("src/bdd/Database.php");
require_once("src/lib/cleanData.php");

use  Application\bdd\DataBase;
class Agent
{
   private int $id_agent;
   private string $agtNom;
   private string $agtSexe;

    private string $agtTel;

    private string $agtQuartier;

    private int $agtAge;

    private String $agtDataDeNaissance;

    private String $agtCreationComptetDate;

    private String $agtCreationComptetHeure;

    private string $agtMotDePasse;
    private string $agtPhoto;
    private string $agtEmail;
    private string $agtPrenom;

    private string $agtAdresse;

    public function getAgtAdresse(): string
    {
        return $this->agtAdresse;
    }

    public function setAgtAdresse(string $agtAdresse): void
    {
        $this->agtAdresse = $agtAdresse;
    }

    public function getIdAgent(): int
    {
        return $this->id_agent;
    }

    public function setIdAgent(int $id_agent): void
    {
        $this->id_agent = $id_agent;
    }

    public function getAgtNom(): string
    {
        return $this->agtNom;
    }

    public function setAgtNom(string $agtNom): void
    {
        $this->agtNom = $agtNom;
    }

    public function getAgtSexe(): string
    {
        return $this->agtSexe;
    }

    public function setAgtSexe(string $agtSexe): void
    {
        $this->agtSexe = $agtSexe;
    }

    public function getAgtTel(): string
    {
        return $this->agtTel;
    }

    public function setAgtTel(string $agtTel): void
    {
        $this->agtTel = $agtTel;
    }

    public function getAgtQuartier(): string
    {
        return $this->agtQuartier;
    }

    public function setAgtQuartier(string $agtQuartier): void
    {
        $this->agtQuartier = $agtQuartier;
    }

    public function getAgtAge(): int
    {
        return $this->agtAge;
    }

    public function setAgtAge(int $agtAge): void
    {
        $this->agtAge = $agtAge;
    }

    public function getAgtDataDeNaissance(): string
    {
        return $this->agtDataDeNaissance;
    }

    public function setAgtDataDeNaissance(string $agtDataDeNaissance): void
    {
        $this->agtDataDeNaissance = $agtDataDeNaissance;
    }

    public function getAgtCreationComptetDate(): string
    {
        return $this->agtCreationComptetDate;
    }

    public function setAgtCreationComptetDate(string $agtCreationComptetDate): void
    {
        $this->agtCreationComptetDate = $agtCreationComptetDate;
    }

    public function getAgtCreationComptetHeure(): string
    {
        return $this->agtCreationComptetHeure;
    }

    public function setAgtCreationComptetHeure(string $agtCreationComptetHeure): void
    {
        $this->agtCreationComptetHeure = $agtCreationComptetHeure;
    }

    public function getAgtMotDePasse(): string
    {
        return $this->agtMotDePasse;
    }

    public function setAgtMotDePasse(string $agtMotDePasse): void
    {
        $this->agtMotDePasse = $agtMotDePasse;
    }

    public function getAgtPhoto(): string
    {
        return $this->agtPhoto;
    }

    public function setAgtPhoto(string $agtPhoto): void
    {
        $this->agtPhoto = $agtPhoto;
    }

    public function getAgtEmail(): string
    {
        return $this->agtEmail;
    }

    public function setAgtEmail(string $agtEmail): void
    {
        $this->agtEmail = $agtEmail;
    }

    public function getAgtPrenom(): string
    {
        return $this->agtPrenom;
    }

    public function setAgtPrenom(string $agtPrenom): void
    {
        $this->agtPrenom = $agtPrenom;
    }

}


class AgentRepository{

    public DataBase $connection;

    /**
     * @return array
     */
    public function getAgents(): array
    {
        $statement = $this->connection::connect()->prepare("SELECT * FROM agent");
        $statement->execute();
        $agents = [];
        while ($row =  $statement->fetch()){
            $agent = new Agent();
            $agent->setIdAgent($row["id_agent"]);
            $agent->setAgtNom($row["agt_nom"]);
            $agent->setAgtPrenom($row["agt_prenom"]);
            $agent->setAgtQuartier($row["agt_quartier"]);
            $agent->setAgtTel($row["agt_telephone"]);
            $agent->setAgtEmail($row["agt-mail"]);
            $agent->setAgtAge($row["agt_age"]);
            $agent->setAgtAdresse($row["agt_adresse"]);
            $agent->setAgtPhoto($row["agt_photo"]);
            $agent->setAgtCreationComptetHeure($row["heure"]);
            $agent->setAgtCreationComptetDate($row["date_agt"]);
            $agent->setAgtDataDeNaissance($row["dateNaiss_agt"]);
            $agent->setAgtSexe($row["agt_sexe"]);
            $agents[] = $agent;
        }
        return $agents;
    }

    public function getAgent(string $id):Agent
    {
        $statement = $this->connection::connect()->prepare("SELECT * FROM agent where id_agent = ?");
        $statement->execute([$id]);
        $row =  $statement->fetch();
        $agent = new Agent();
        $agent->setIdAgent($row["id_agent"]);
        $agent->setAgtNom($row["agt_nom"]);
        $agent->setAgtPrenom($row["agt_prenom"]);
        $agent->setAgtQuartier($row["agt_quartier"]);
        $agent->setAgtTel($row["agt_telephone"]);
        $agent->setAgtEmail($row["agt-mail"]);
        $agent->setAgtAge($row["agt_age"]);
        $agent->setAgtAdresse($row["agt_adresse"]);
        $agent->setAgtPhoto($row["agt_photo"]);
        $agent->setAgtCreationComptetHeure($row["heure"]);
        $agent->setAgtCreationComptetDate($row["date_agt"]);
        $agent->setAgtDataDeNaissance($row["dateNaiss_agt"]);
        $agent->setAgtSexe($row["agt_sexe"]);
        return $agent;
    }

    public function createAgent(array $input,array $image): void
    {
        if (!empty($input)) {

            $nom_agt = cleanData($input["nom"]);
            $prenom_agt = cleanData($input["prenom"]);
            $dateNaiss = cleanData($input["dateNaiss"]);
            $anneeNaiss = (int) explode("-", cleanData($input["dateNaiss"]))[0];
            $password = md5(cleanData($input["pass"]));
            $telephone = cleanData($input["tel"]);
            $adresse = cleanData($input["adresse"]);
            $quartier = cleanData($input["quartier"]);
            $sexe = cleanData($input["sexe"]);
            $mail = cleanData($input["mail"]);
            $age = (int) date("Y") - $anneeNaiss;
            $photo = $image["photo"]["name"];
            $photo_temp = $image["photo"]["tmp_name"];
            move_uploaded_file($photo_temp, "src/img/img_agent/" . $photo);
            $requete = $this->connection::connect()->prepare("INSERT INTO `agent`(`agt_nom`, `agt_prenom`, `agt_age`, `agt_sexe`, `agt_telephone`, `agt_adresse`, `agt_quartier`,
             `agt_mot_de_passe`, `agt-mail`, `agt_photo`,
             `dateNaiss_agt`, `date_agt`, `heure`) VALUES (?,?,?,
             ?,?,?,?,?,?,?,
            ?,CURRENT_DATE(),CURRENT_TIME())");
            $params = array($nom_agt, $prenom_agt, $age, $sexe, $telephone, $adresse, $quartier, $password, $mail, $photo, $dateNaiss);
            $requete->execute($params) or die(var_dump("erreur lors de 'insertion"));

        }
    }

    public function deleteAgent(string $id):void{
        if(!empty($id)){
            $requete = $this->connection::connect()->prepare("DELETE FROM agent where id_agent = ?");
            $requete->execute(array($id));
        }
    }


    public function updateAgent(array $input,string $id,array $image):void
    {
        if (!empty($input)  && !empty($id)) {
            $nom_agt = cleanData($input["nom"]);
            $prenom_agt = cleanData($input["prenom"]);
            $dateNaiss = cleanData($input["dateNaiss"]);
            $anneeNaiss = (int) explode("-", cleanData($input["dateNaiss"])[0]);
            $telephone = cleanData($input["tel"]);
            $adresse = cleanData($input["adresse"]);
            $quartier = cleanData($input["quartier"]);
            $sexe = cleanData($input["sexe"]);
            $mail = cleanData($input["mail"]);
            $age = (int) date("Y") - $anneeNaiss;

            if (isset($image) && !empty($image["photo"]["size"]) > 0) {
                $photo = $image["photo"]["name"];
                $photo_temp = $image["photo"]["tmp_name"];
                move_uploaded_file($photo_temp, "src/img/img_agent/" . $photo);
                $requete = $this->connection::connect()->prepare("UPDATE `agent` SET `agt_nom`=?,`agt_prenom`=?,`agt_age`=?,
            `agt_sexe`=?,`agt_telephone`=?,`agt_adresse`=?,
            `agt_quartier`= ?,`agt-mail`=?,
            `dateNaiss_agt`=?,`agt_photo`=?
            WHERE id_agent = ?");
                $params = array($nom_agt, $prenom_agt, $age, $sexe, $telephone, $adresse, $quartier, $mail, $dateNaiss, $photo, $id);
                $requete->execute($params) or die(var_dump("erreur lors de la mise à jour"));
            } else {
                $requete = $this->connection::connect()->prepare("UPDATE `agent` SET `agt_nom`=?,`agt_prenom`=?,`agt_age`=?,
        `agt_sexe`=?,`agt_telephone`=?,`agt_adresse`=?,
        `agt_quartier`= ?,`agt-mail`=?,
        `dateNaiss_agt`=?
         WHERE id_agent = ?");
                $params = array($nom_agt, $prenom_agt, $age, $sexe, $telephone, $adresse, $quartier, $mail, $dateNaiss, $id);
                $requete->execute($params) or die(var_dump("erreur lors de la mise à jour de l'agent "));
            }
        }
    }
}
