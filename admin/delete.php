<?php 
    require 'database.php';

    
    // var_dump($_POST);

    if(!empty($_GET['id'])) //si je t'ai passé en get un id alors tu me le mets dans une variable qui s'apl id
    {
        $id = checkInput($_GET['id']); //je récupère le id & je le stocke dans mon formulair e plus bas
    }

    if(!empty($_POST)) // ça veut dire que j'ai appuyé sur le bouton oui si pas vide alors je recupere mon id
    //je récupère et supprime les infos au deuxième passage donc
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
        exit;
    }

    function checkInput($data)//je vérifie ma variable au cas où qq'un soit mal intentionné
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
<link rel="stylesheet" href="../style.css">
<title>Pupuce</title>
</head>
<body>

 <nav class="navbar navbar-light ">
    <a class="navbar-brand" href="../index.php">
        <img src="../images/pupuce.png" width="70" height="70" class="d-inline-block align-top" alt="logo">
        <span class="navbar-text pacifico mt-2">Pupuce</span>
    </a>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a type="button" class="mr-2 nav-link btn-outline-info" href="logout.php">Page d'accueil</a>
        </li>
        <li class="nav-item">
            <a type="button" class="mr-2 nav-link btn-outline-info  active" href="../sinscrire.php">S'inscrire</a>
        </li>
        <li class="nav-item">
            <a class="mr-2 nav-link btn-outline-info" href="../seconnecter.php">Se connecter</a>
        </li>
        <!-- <li class="nav-item">
            <a class="mr-2 nav-link btn-outline-info" href="#">Panier</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link btn-outline-danger" href="../login.php">Admin</a>
        </li>
    </ul>
</nav>

    <h1>Chez Pupuce</h1>
    <div class="container admin">
        <div>
            <h1 class="grey"><strong>Supprimer un article </strong></h1>
            <br>
            <form class="form" role="form" action="delete.php" method="post">
              <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
              <!-- plutôt que de passer l'id dans l'url j'utilise cet input hidden qui me permet de récupérer l'id après avec ma méthode post -->
                <p class="alert alert-warning">Etes-vous sûr de vouloir supprimer cet article ? </p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-warning"> Oui</button>
                    <a class="btn btn-default" href="index.php">Non</a>
                </div>
            </form>
        </div>
</body>
</html>