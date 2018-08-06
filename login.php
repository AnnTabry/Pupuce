<?php 
require_once 'admin/database.php';

if(isset($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    extract($_POST);

    $sql = "SELECT users_psw FROM users WHERE users_name ='".$username."'";
    $req = $db->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>');
  
    $data = $req->fetch(PDO::FETCH_ASSOC);
     //var_dump($data);
  
    if($data['users_psw'] != $password) {
      echo '<p class="text-center font-weight-bold red fixed-bottom"> Mauvais login / password. <br>Merci de recommencer !</p>';
      $message = "Login / Mot de passe invalide. <br>Merci de bien vouloir recommencer.";
  
    }
    else {
      session_start();
      $_SESSION['username'] = $username;
      header ("Location: admin/index.php");
    }
  }  

 $message="";
// if(count($_POST)>0) {
//     $db = mysqli_connect("localhost","root","Koal@1603","pupuce");
//     $result = mysqli_query($db, "SELECT * FROM users WHERE users_name ='". $_POST['username'] ."' and users_psw = '" . $_POST['password'] . "'");
   
//     $count = mysqli_num_rows($result);
//     if($count == 0) {
//         $message = "Login / Mot de passe invalide";
//     } else {
//         $message = "Vous êtes authentifié " . $_POST['username'] . " <br>Vous pouvez allez sur la partie <a href='admin/index.php'>Admin</a>";
//     }
// }
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
    <title>Pupuce - login</title>
</head>
<body>

    <nav class="navbar navbar-light ">
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

    <!-- mon formulaire de login -->
<div class="d-flex justify-content-center mt-5">    
    <form method="post" action="login.php" class="img-thumbnail text-center p-4 mb-5">
        <fieldset>
            <legend><h1 class="pt-1">Identification</h1></legend>
            <div class="message font-weight-bold"><?php if($message!="") { echo $message ; } ?><br><br>  
            <label for="username" style="width: 40%"><b> Nom :</b></label>
            <input class="form-control form-control-lg" type="text" name="username" placeholder="Votre nom" value="<?php if (isset($_POST['username'])) { echo $_POST['username'];}?>" >
            <br><br>
            <label for="password" style="width: 40%"><b> Mot de passe :</b></label>
            <input class="form-control form-control-lg" type="password" name="password" placeholder="Votre mot de passe" value="<?php if (isset($_POST['password'])) { echo $_POST['password']; } ?>" >
            <br><br>
            <p><input type="submit" value="Se connecter" name="login" class="btn btn-lg btn-block btn-success"></p>
        </fieldset>
        </div>
    </form>
    </div>
</body>
</html>




