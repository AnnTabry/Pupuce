<?php

require 'admin/database.php';


if(isset($_POST) && !empty($_POST['email']) && !empty($_POST['psw'])) {
  extract($_POST);

  // on recupère le password de la table qui correspond au login du visiteur
  $sql = "SELECT clients_mail, clients_psw FROM clients WHERE clients_mail ='$email' AND clients_psw = '$psw' ";
  $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>');

  $data = $req->fetch(PDO::FETCH_ASSOC);
//   var_dump($data);

  if($data['clients_mail'] != $email && $data['clients_psw'] != $psw ) {
      echo '<p class="text-center red">Mauvais login / password <br> Merci de recommencer</p>';
  }
  else {
    session_start();
    $_SESSION['clients_mail'] = $email;
    $_SESSION['clients_psw'] = $psw;
    header ("Location: index.php");

    // ici vous pouvez afficher un lien pour renvoyer
    // vers la page d'accueil de votre espace membres
  }
}


?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
    <title>Pupuce</title>
</head>
<body>

        <nav class="navbar navbar-light mb-2">
            <a class="navbar-brand" href="index.php">
                <img src="images/pupuce.png" width="70" height="70" class="d-inline-block align-top" alt="logo">
                <span class="navbar-text pacifico mt-2">Pupuce</span>
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a type="button" class="mr-2 nav-link btn-outline-info" href="index.html">Page d'accueil</a>
                </li>
                <li class="nav-item">
                    <a type="button" class="mr-2 nav-link btn-outline-info  active" href="sinscrire.php">S'inscrire</a>
                </li>
                <li class="nav-item">
                    <a class="mr-2 nav-link btn-outline-info" href="seconnecter.php">Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-danger" href="login.php">Admin</a>
                </li>
            </ul>
        </nav>

    <div class="container site accueil text-center">
        <div>
            <img src="images/veterinaire-thetford_logo.png" alt="logo" style="width: 10%;" class="float-right mt-5">
            <h1>Bienvenue chez Pupuce ! </h1>
        </div>  
        <div class="container img-thumbnail col-md-8 mb-5">
            <form method="post" action="seconnecter.php" role="form" class="text-center">
                <fieldset>
                    <legend><h1>Se connecter</h1></legend>
                    <div class="row">
                        
                        <div class="offset-md-1 col-md-10">
                            <label for="name">Email *</label>
                            <input type="text" name="email" class="form-control" placeholder="Votre Email">
                            <p class="comments"><?php 
                            //echo $mailError; ?></p>
                        </div>
                        <div class="offset-md-1 col-md-10">
                            <label for="psw">Mot de passe *</label>
                            <input type="password" name="psw" class="form-control" placeholder="Votre mot de passe">
                            <p class="comments"><?php 
                            //echo $pswError; ?></p>
                        </div>
                        <div class="col-md-12">
                            <p>* Ces informations sont requises.</p>
                        </div>
                        <div class="offset-md-1 col-md-10">
                            <input type="submit" class="btn-success btn-lg btn-block mb-2" value="Valider">
                        </div>    
                    </div>

                        <p class="thx text-center font-weight-bold mt-3" style="display:<?php 
                        
                        // if($isSuccess) 
                        // {
                        //     echo 'block ">Vous êtes bien connecté :))) Merci '. $name . '<br><a class="btn btn-info mt-3 mr-5" href="index.php">Aller sur le site</a>';
                        // }
                        // else 
                        // {
                        //     echo 'none ">'; 
                        // }
                        ?>;">
                    </p>

                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>


