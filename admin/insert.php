<?php 
    require 'database.php';

    $nameError = $descriptionError = $priceError = $categoryError = $imageError = $codeError = $name = $description = $price = $category = $image = $code = "" ;

    //est-ce que la variable superglobale post est vide //formulaire
    if(!empty($_POST)) //si pas vide alors : 
    {
        $name = checkInput($_POST['name']); // j'ulise la fonction checkInput par mesure de sécurité
        $description = checkInput($_POST['description']); 
        $price = checkInput($_POST['price']); 
        $category = checkInput($_POST['category']); 
        $image = checkInput($_FILES['image']['name']); 
        $imagePath = '../images/' . basename($image) ; //me donne le chemin de l'image
        $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
        $code = checkInput($_POST['code']);
        $isSuccess = true;
        $isUploadSuccess = false;

        if(empty($name))
        {
            $nameError = 'Veuillez remplir ce champ';
            $isSuccess = false;
        }
        if(empty($description))
        {
            $descriptionError = 'Veuillez remplir ce champ';
            $isSuccess = false;
        }
        if(empty($price))
        {
            $priceError = 'Veuillez remplir ce champ';
            $isSuccess = false;
        }
        if(empty($category))
        {
            $categoryError = 'Veuillez remplir ce champ';
            $isSuccess = false;
        }
        if(empty($code))
        {
            $imageError = 'Veuillez remplir ce champ';
            $isSuccess = false;
        }
        if(empty($image))
        {
            $imageError = 'Veuillez remplir ce champ';
            $isSuccess = false;
        }
        else //si l'image n'est pas vide
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif")
            {
                $imageError = "Les fichiers autorisés sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
           /* if(file_exists($imagePath))
            {
                $imageError = "le fichier existe déjà !";
                $isUploadSuccess = false;
            }*/
            if($_FILES["image"]["size"] > 500000)
            {
                $imageError = "Le fichier ne doit pas dépasser les 500KB";
                $isUploadSuccess = false;
            }
            // if($isUploadSuccess)
            // {
            //     if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath))
            //     {
            //         $imageError = "il y a eu une erreur lors du téléchargement";
            //         $isUploadSuccess = false;
            //     }
            // }
        }
        if($isSuccess && $isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare('INSERT INTO items (name,description,price,category,image, code) values (?,?,?,?,?, ?)');
            $statement->execute(array($name,$description, $price,$category,$image, $code));
            Database::disconnect();
            header("Location: index.php");
        }
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
            <h1 class="grey"><strong>Ajouter un article </strong></h1>
            <br>
            <form class="form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom :</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?> "/>
                    <span class="help-inline"><?php echo $nameError; ?></span>
                </div>
                <div class="form-group">
                <label for="description">Description :</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="description" value="<?php echo $description; ?> "/>
                    <span class="help-inline"><?php echo $descriptionError; ?></span>
                </div>
                <div class="form-group">
                <label for="price">Prix : (en €)</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="prix" value="<?php echo $price; ?> "/>
                    <span class="help-inline"><?php echo $priceError; ?></span>
                </div>
                <div class="form-group">
                <label for="category">Catégorie :</label>
                    <select class="form-control" id="category" name="category">
                        <?php 
                        $db = Database::connect();
                        foreach($db->query('SELECT * FROM categories') as $row)
                        {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                        Database::disconnect();
                         ?>
                    </select>
                    <span class="help-inline"><?php echo $categoryError; ?></span>
                </div>
                <div class="form-group">
                <label for="image">Sélectionner une image</label>
                    <input type="file" class="form-control" id="image" name="image"/>
                    <span class="help-inline"><?php echo $imageError; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Code de l'article :</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Code" value="<?php echo $code; ?> "/>
                    <span class="help-inline"><?php echo $codeError; ?></span>
                </div>
                
           
            <div class="form-actions">
                <button type="submit" class="btn btn-success"> + Ajouter</button>
                <a class="btn btn-primary" href="index.php">Retour</a>
            </div>
            </form>
        </div>
</body>
</html>