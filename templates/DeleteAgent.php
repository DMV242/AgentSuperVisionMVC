<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/bootstrap-theme.css">
    <link rel="stylesheet" href="src/css/agent/index.css">
    <title>Supprimer un agent</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <form method="post" action="index.php?action=delete&id=<?= $agent->getIdAgent();?>&view=no ">
                    <input type="hidden" value="<?= $agent->getIdAgent(); ?>">
                    <h2 class="alert alert-danger">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        Êtes-vous sûr de vouloir supprimer cet utilisateur ?

                    </h2>


                    <button type="submit" class="btn btn-danger">Oui</button>
                    <a href="index.php" class="btn btn-primary">Non</a>
                </form>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>

</body>

</html>