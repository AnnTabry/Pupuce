<?php
    require 'database.php';

    if(!empty($_GET['id'])) //si la superglobale get avec id n'est pas vide alors...cet id tu me le met dans une variable (que je check)
    {
        $id = checkInput($_GET['id']);
    }

    $db = Database::connect(); //j'utilise ma fonction statique de database.php

    $statement = $db->prepare('SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?');
    //je dois faire un select sur un id que je ne connais pas donc j'utilise la fonction prepare et le ?, puis j'execute ma requête :
    $statement->execute(array($id));
    //maintenant je la stocke dans une varialbe
    $item = $statement->fetch(); //je récupere ma ligne / mon item
    Database::disconnect(); //je déconnecte

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
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
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
        <div class="row">
            <div class="col-sm-6">
                <h1 class="grey"><strong>Voir un article </strong></h1>
                <br>
                <form>
                    <div class="form-group">
                        <label>Nom :</label><?php echo ' ' . $item['name']; ?>
                    </div>
                    <div class="form-group">
                        <label>Description :</label><?php echo ' ' . $item['description']; ?>
                    </div>
                    <div class="form-group">
                        <label>Prix :</label><?php echo ' ' . number_format((float)$item['price'],2, '.' ,'') . ' €'; ?>
                    </div>
                    <div class="form-group">
                        <label>Catégorie :</label><?php echo ' ' . $item['category']; ?>
                    </div>
                    <div class="form-group">
                        <label>Image :</label><?php echo ' ' . $item['image']; ?>
                    </div>
                </form>
                <div class="form-actions">
                    <a class="btn btn-primary" href="index.php">Retour</a>
                </div>
            
        </div>
    
        
        <div class="col-sm-6 my-auto">
            <div class="img-thumbnail">
                <img src="<?php echo '../images/' . $item['image']; ?>" class="m-2 col-sm-11">
                <div class="price"><?php echo number_format((float)$item['price'],2, '.' ,''). ' €'; ?></div>
                <div class="caption">
                 <h3 class="pacifico text-center"><?php echo $item['name']; ?></h3>
                 <p><?php echo $item['description']; ?></p>
                 </div>
             </div>
         </div>
      

    </div>

</body>
</html>