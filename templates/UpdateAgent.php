<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/css/bootstrap.css">
    <link rel="stylesheet" href="src/css/bootstrap-theme.css">
    <link rel="stylesheet" href="src/css/agent/index.css">
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">


                <form method="post" action="index.php?action=update&id=<?= $agent->getIdAgent();?>&view=no"
                    enctype="multipart/form-data">
                    <h2 class="text-info">Modifier l'agent  <?= $agent->getAgtNom(); ?> <?= $agent->getAgtPrenom(); ?>
                    </h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Nom
                            Agent</label>

                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username"
                            name="nom" value="<?= $agent->getAgtNom(); ?>" required>


                    </div>
                    <div class="form-group">
                        <label for="prenom"> Prénom Agent</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Password" name="prenom"
                            value="<?= $agent->getAgtPrenom(); ?>" required>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dateNaiss"> Date de Naissance</label>
                                <input type="date" class="form-control" id="dateNaiss" placeholder="XXXX/XX/XX"
                                    name="dateNaiss" value="<?=  $agent->getAgtDataDeNaissance() ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="age"> Age</label>
                                <input type="number" class="form-control" id="age" placeholder="Exemple:19" name="age"
                                    value="<?= $agent->getAgtAge(); ?>" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sexe">Sexe</label>
                                <select class="form-control" id="sexe" name="sexe"
                                    value="<?= $agent->getAgtSexe(); ?>" required>
                                    <option value="masculin">masculin</option>
                                    <option value="féminin">féminin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="InputPassword"> Téléphone Agent</label>
                                <input type="tel" class="form-control" id="InputPassword"
                                    placeholder="Exemple:+242 0X XXX XX XX" name="tel"
                                    value="<?= $agent->getAgtTel(); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="adresse"> Adresse</label>
                                <input type="text" class="form-control" id="adresse"
                                    placeholder="Exemple: Alkhar Derrière la station totale" name="adresse"
                                    value="<?= $agent->getAgtAdresse(); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="quartier"> Quartier</label>
                                <input type="text" class="form-control" id="quarier" placeholder="Exemple: Tchiali"
                                    name="quartier" value="<?= $agent->getAgtQuartier(); ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mail"> Email:</label>
                                <input type="email" class="form-control" id="mail" placeholder="Exemple:user@gmail.com"
                                    name="mail" value="<?=  $agent->getAgtEmail(); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Image"> Image:</label>
                                <input type="text" class="form-control" id="Image" placeholder="Exemple:user@gmail.com"
                                    name="image" value="<?= $agent->getAgtPhoto(); ?>" disabled>

                            </div>
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="photo"> Photo : </label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>



                    <button type="submit" class="btn btn-success">Confirmer</button>
                    <a href="accueilAdmin.php" class="btn btn-primary">Annuler</a>
                </form>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>

</body>



</html>