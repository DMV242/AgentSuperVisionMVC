<?php

require_once("src/fpdf.php");
use Application\bdd\DataBase;

class PDF extends FPDF
{
// En-tête
    public function Header()
    {
        // Logo
        $this->Image('src/img/Armoirie.png', 160, 2, 30);

        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Décalage à droite
        $this->Cell(35);
        // Titre
        $this->Cell(100, 10, 'FICHE DE RENSEIGNEMENT', 1, 0, 'C');

        // Saut de ligne
        $this->Ln(30);
    }
    public function Body()
    {

        if (isset($_GET["id"]) && !empty($_GET["id"])) {

            $id = $_GET["id"];
            $db = DataBase::connect();
            $requete = $db->prepare("SELECT agt_nom,agt_prenom,agt_age,agt_sexe,agt_telephone,agt_adresse,agt_quartier,`agt-mail`,agt_photo,dateNaiss_agt FROM agent where id_agent = ?");
            $requete->execute(array($id));
            $agent = $requete->fetch();
            $nom = $agent["agt_nom"];

        }
        $this->Image("src/img/img_agent/" . $agent["agt_photo"], 10, 35, 80, 50);
        $this->Cell(85);
        $this->SetFontSize(13);

        $this->Cell(10, 10, "Nom: " . $agent["agt_nom"], 0, 1);
        $this->Cell(85);
        $this->Cell(10, 10,  mb_convert_encoding("Prénom : ", 'ISO-8859-1', 'UTF-8') . $agent["agt_prenom"], 0, 1);
        $this->Cell(85);
        $this->Cell(10, 10, " Age : " . $agent["agt_age"] . " ans", 0, 1);
        $this->Cell(85);
        $this->Cell(10, 10, "Adresse mail: " . $agent["agt-mail"], 0, 1);
        $this->Ln(20);
        $this->Cell(10);
        $this->SetFontSize(12);
        $this->Cell(2 * 40, 10, "Date De Naissance: " . $agent["dateNaiss_agt"], 1, 0, "C");
        $this->Cell(2 * 40, 10, "Adresse : " . mb_convert_encoding($agent["agt_adresse"], 'ISO-8859-1', 'UTF-8'), 1, 0, "C");
        $this->Ln(15);
        $this->Cell(10);
        $this->Cell(2 * 40, 10,   mb_convert_encoding("Numéro de Téléphone: ", 'ISO-8859-1', 'UTF-8') . $agent["agt_telephone"], 1, 0, "C");
        $this->Cell(2 * 40, 10, "Quartier: " . $agent["agt_quartier"], 1, 0, "C");
        $this->Ln(130);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(1);
        $this->Cell(2 * 45, 10, mb_convert_encoding("Votre Signature ", 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
        $this->Line(40, 253, 70, 253);
        $this->Cell(2 * 40, 10, mb_convert_encoding("Signature Du directeur Général", 'ISO-8859-1', 'UTF-8'), 0, 0, "C");
        $this->Line(110, 253, 170, 253);
    }

// Pied de page
    public function Footer()
    {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Numéro de page
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Body();
$pdf->SetFont('Times', '', 12);
$pdf->Output("", "AttestionTravail", true);
