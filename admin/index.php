<?php
	session_start();
    
	//si on n'est pas connecté : nous sommes redirigés vers l'acceuil
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
		header('Location: login.php');
		die;
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
                <a type="button" class="mr-2 nav-link btn-outline-info" href="../logout.php">Page d'accueil</a>
            </li>
            <li class="nav-item">
                <a type="button" class="mr-2 nav-link btn-outline-info  active" href="../sinscrire.php">S'inscrire</a>
            </li>
            <li class="nav-item">
                <a class="mr-2 nav-link btn-outline-info" href="../seconnecter.php">Se connecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-outline-danger" href="fournisseurs/index.php">Gérez les fournisseurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-outline-danger" href="employes.index.php">Gérez les employés</a>
            </li>
        </ul>
    </nav>

    <div>
        <img src="../images/veterinaire-thetford_logo.png" alt="logo" style="width: 10%;" class="float-right mt-5">
        <h1>Bienvenue chez Pupuce ! </h1>
    </div>  


 <div class="tab-content" id="myTabContent">

    <div class="container admin tab-pane fade show active" id="articles">
    
        <div class="row">
            <h2 class="grey mb-5"><strong>Liste des articles : </strong>
            <a href="insert.php" class="btn btn-success btn-lg">+ Ajouter un article </a>
            </h2>

            <table class="table table-striped table-border">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Action</th>
                    </tr>  
                </thead>
                <tbody>

                    <?php
                    require 'database.php';
                    $db = Database::connect(); //je me connecte à ma fonction statique publique connect (de ma classDatabase() qui me retourne la bdd
                    $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');

                    while($item = $statement->fetch()) //récupère juste une ligne puis fait une boucle dessus
                    {
                        echo '<tr>';
                            echo '<td>' . $item['name'] . '</td>';
                            echo '<td>' . $item['description'] . '</td>';
                            echo '<td>' . number_format((float)$item['price'],2, '.' ,'') . '€' . '</td>';//fonction pour nombres décimaux
                            echo '<td>' . $item['category'] . '</td>';
                            
                            echo '<td width=300>';
                                echo '<a class="btn btn-default" href="view.php?id=' . $item['id'] . '">Voir</a>';
                                echo '  ';
                                echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '">Modifier</a>';
                                echo '  ';
                                echo '<a class="btn btn-danger" href="delete.php?id=' . $item['id'] . '">Supprimer</a>';
                            echo '</td>';
                        echo '</tr>';
                    }

                    Database::disconnect(); //je déconnecte
                    ?>

                </tbody>
            </table>
        </div>

    </div>

      <div class="container admin tab-pane fade" id="fournisseurs">
...................................................................................
      </div>

        <div class="container admin tab-pane fade" id="employes">
            :::::::::::::::::::::::::::::::::::::::::::::::::::::
        </div>

 </div>
</body>
</html>