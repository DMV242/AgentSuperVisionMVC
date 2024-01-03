<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/bootstrap-theme.css">
    <link rel="stylesheet" href="src/css/agent/index.css">
</head>

<body class="container-fluid">
    <?php

require "menu.php";

?>



    <div class="row">
        <table class="table table-hover">
            <thead>
                <th>CODE</th>
                <th>PHOTO</th>
                <th>INFORMATIONS PERSONNELLES</th>
                <th>DATE DE CREATION</th>
                <th>HEURE DE CREATION</th>
                <th>ACTIONS</th>

            </thead>
            <tbody>
                <?php
                foreach ($agents as $agent) {

    ?>
                <tr>
                    <td><?= $agent->getIdAgent() ?></td>
                    <td><img src="src/img/img_agent/<?= $agent->getAgtPhoto(); ?> " alt=<?=  $agent->getAgtPhoto() ?> width="200px">
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-md-6">
                                <p> Nom : <?= $agent->getAgtNom(); ?></p>
                                <p>Prénom : <?= $agent->getAgtPrenom(); ?></p>
                                <p>Âge : <?= $agent->getAgtAge(); ?></p>
                                <p>Sexe : <?= $agent->getAgtSexe(); ?></p>
                                <p>Adresse : <?= $agent->getAgtAdresse(); ?></p>
                            </div>
                            <div class="col-md-6">

                                <p>Quartier : <?= $agent->getAgtQuartier(); ?></p>
                                <p>Mail : <?=  $agent->getAgtEmail(); ?></p>
                                <p>Date de naissance : <?=  $agent->getAgtDataDeNaissance() ?></p>
                            </div>
                        </div>


                    </td>
                    <td><?= $agent->getAgtCreationComptetDate() ?></td>
                    <td><?=  $agent->getAgtCreationComptetHeure(); ?></td>

                    <td>

                        <a href="index.php?action=generate&id=<?= $agent->getIdAgent()?>" class="btn btn-success"
                           target="_blank"> <span class="glyphicon glyphicon-list-alt"></span> Génerer un rapport</a>
                        <hr>

                        <a href="index.php?action=update&id=<?= $agent->getIdAgent()?>&view=yes" class="btn btn-primary"> <span
                                    class="glyphicon glyphicon-edit"> </span>Modifier</a>
                        <hr>
                        <a href="index.php?action=delete&id=<?= $agent->getIdAgent()?>&view=yes" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Supprimer</a>

                    </td>
                </tr>
            </tbody>
            <?php
}
?>
    </div>

    </table>


</body>

</html>