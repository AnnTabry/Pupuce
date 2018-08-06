<?php
require 'admin/database.php';

$db = Database::connect();

// j'initialise mes variables l'utilisateur n'a pas encore cliqué = 1°lecture 
$firstname = $name = $mail = $psw = "";
$firstnameError = $nameError = $mailError = $pswError = "";

// je crée une variable succes que j'initialise à false et je l'utilise en false à chaque fois que j'ai une erreur
$isSuccess = false;

//l'utilisateur à cliqué & soumis ses données maintenant je les initialise donc à ce qu'à donné l'utilisateur = 2°passage
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $firstname  = test_input($_POST['firstname']);
    $name       = test_input($_POST['name']);
    $mail       = test_input($_POST['mail']);
    $psw        = test_input($_POST['psw']);
    $isSuccess = true;

    // Hachage du mot de passe
    $pass_hache = password_hash($_POST['psw'], PASSWORD_DEFAULT);
    
    $req = $db->prepare('INSERT INTO clients(clients_firstname, clients_name, clients_mail, clients_psw) VALUES(:clients_firstname, :clients_name, :clients_mail, :clients_psw)');

    $req->execute(array(
        'clients_firstname' => $firstname,
        'clients_name' => $name,
        'clients_mail' => $mail,
        'clients_psw' => $pass_hache
    ));

//je commence à poser mes questions : est-ce que le prénom est vide etc
    if(empty($firstname))
    {
        $firstnameError = "Mais quel est donc ton prénom ???";
        $isSuccess = false;
    }
    else
    {
        //????????????
    }

    if(empty($name))
    {
        $nameError = "Mais pourquoi es-tu si mystérieux ??!";
        $isSuccess = false;
    }

    if(!isEmail($mail)) //si ce n'est pas un email valide alors je rentre dans ce if (isEmail=true)
    {
        $mailError = "non c'est pas un email valide ça ! ;)";
        $isSuccess = false;
    }

    if(empty($psw))
    {
        $pswError = "t'inquiètes je ne peux pas voir ton mot de passe !";
        $isSuccess = false;
    }
}
else
{
    //echo "pb de connexion";
}

//header('Location: index.php');
//exit;

//des fonctions existent déjà pour vérifier & valider les emails -> filter_var 
function isEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

//je vérifie et sécurise mes inputs avec cette fonction
function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
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
            <!-- <li class="nav-item">
                <a class="mr-2 nav-link btn-outline-info" href="panier.php">Panier</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link btn-outline-danger" href="login.php">Admin</a>
            </li>
        </ul>
    </nav>

    <div class="container site">

     <div>
            <img src="images/veterinaire-thetford_logo.png" alt="logo" style="width: 10%;" class="float-right mt-5">
            <h1>Bienvenue chez Pupuce ! </h1>
        </div>  


        <div class="row">
               <div>
               <!--j'utilise la superglobale server pour traiter les informations sur la même page -->
                    <form class="col-lg-8 img-thumbnail mx-auto px-5 mb-3" method="post" action="<?php echo test_input($_SERVER['PHP_SELF']); ?>" role="form">
                    <fieldset>
                    <legend><h1>S'inscrire</h1></legend>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname">Prénom <span class="blue">*</span></label>
                                <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">
                                <p class="comments font-italic"><?php echo $firstnameError; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Nom <span class="blue">*</span></label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="Votre Nom" value="<?php echo $name; ?>">
                                <p class="comments font-italic"><?php echo $nameError; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="mail">Email <span class="blue">*</span></label>
                                <input type="email" name="mail" class="form-control" placeholder="Votre Email" value="<?php echo $mail; ?>">
                                <p class="comments font-italic"><?php echo $mailError; ?></p>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Mot de passe *</label>
                                <input type="password" name="psw" class="form-control" placeholder="Choisir un mot de passe" value="<?php echo $psw ; ?>">
                                <p class="comments font-italic"><?php echo $pswError; ?></p>
                            </div>
                            <div class="col-md-12">
                                <p class="blue">* Ces informations sont requises.</p>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-block btn-success my-3" value="Envoyer">
                            </div>    
                        </div>
                        <p class="thx text-center font-weight-bold mt-3" style="display:<?php if($isSuccess) { echo 'block ">Vous êtes bien inscrit :))) Merci '. $firstname. '<br><a class="btn btn-success mt-3 mr-5" href="index.php">Aller sur le site</a><a class="btn btn-success mt-3" href="seconnecter.php">Se connecter</a>'; } else { echo 'none ">'; } ?></p>
</fieldset>
                    </form>                    
                </div>
           </div>
    </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/js/bootstrap.min.js"></script>
</body>
</html>


