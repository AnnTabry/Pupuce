<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$sql = "SELECT * from users";
$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function createNew() {
	$("#add-more").hide();
	var data = '<tr class="table-row" id="new_row_ajax">' +
	'<td contenteditable="true" id="txt_title" onBlur="addToHiddenField(this,\'users_name\')" onClick="editRow(this);"></td>' +'<td contenteditable="true" id="txt_description" onBlur="addToHiddenField(this,\'users_num_secu\')" onClick="editRow(this);"></td>' +'<td><input type="hidden" id="title" /><input type="hidden" id="description" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Save</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancel</a></span></td>' +	
	'</tr>';
  $("#table-body").append(data);
}
function cancelAdd() {
	$("#add-more").show();
	$("#new_row_ajax").remove();
}
function editRow(editableObj) {
  $(editableObj).css("background","#FFF");
}

function saveToDatabase(editableObj,column,id) {
  $(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
  $.ajax({
    url: "edit.php",
    type: "POST",
    data:'column='+column+'&editval='+$(editableObj).text()+'&id='+id,
    success: function(data){
      $(editableObj).css("background","#FDFDFD");
    }
  });
}
function addToDatabase() {
  var title = $("#title").val();
  var description = $("#description").val();
  
	  $("#confirmAdd").html('<img src="loaderIcon.gif" />');
	  $.ajax({
		url: "add.php",
		type: "POST",
		data:'title='+title+'&description='+description,
		success: function(data){
		  $("#new_row_ajax").remove();
		  $("#add-more").show();		  
		  $("#table-body").append(data);
		}
	  });
}
function addToHiddenField(addColumn,hiddenField) {
	var columnValue = $(addColumn).text();
	$("#"+hiddenField).val(columnValue);
}

function deleteRecord(id) {
	if(confirm("Are you sure you want to delete this row?")) {
		$.ajax({
			url: "delete.php",
			type: "POST",
			data:'id='+id,
			success: function(data){
			  $("#table-row-"+id).remove();
			}
		});
	}
}
</script>

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
    <link rel="stylesheet" href="../../style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet"> 
    <title>Pupuce</title>
</head>

<body>

    <nav class="navbar navbar-light ">
        <a class="navbar-brand" href="../index.php">
            <img src="../../images/pupuce.png" width="70" height="70" class="d-inline-block align-top" alt="logo">
            <span class="navbar-text pacifico mt-2">Pupuce</span>
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a type="button" class="mr-2 nav-link btn-outline-info" href="../../logout.php">Page d'accueil</a>
            </li>
            <!-- <li class="nav-item">
                <a type="button" class="mr-2 nav-link btn-outline-info  active" href="../../sinscrire.php">S'inscrire</a>
            </li> -->
            <li class="nav-item">
                <a class="mr-2 nav-link btn-outline-info" href="../../seconnecter.php">Se connecter en tant que client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-outline-danger" href="../index.php">Gérez les articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-outline-danger" href="../fournisseurs/index.php">Gérez les fournisseurs</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link btn-outline-danger" href="../employes/index.php">Gérez les employés</a>
            </li> -->
        </ul>
    </nav>

    <div>
        <img src="../../images/veterinaire-thetford_logo.png" alt="logo" style="width: 10%;" class="float-right mt-5">
        <h1>Bienvenue chez Pupuce ! </h1>
    </div>  

<div class="img-thumbnail offset-md-1 col-md-10">
<div class="txt-heading grey pacifico text-center mb-3">Ajouter / supprimer un employé</div>
<p>Cette page est en cours de réparation . . . </p>
<div class="ajax-action-button btn btn-success" id="add-more" onClick="createNew();">Ajouter un employé </div>
<table class="tbl-qa table table-striped table-bordered mt-4">
  <thead>
	<tr>
	  <th class="table-header">Nom</th>
	  <th class="table-header">Numéro de Sécurité sociale</th>
	  <th class="table-header">Actions</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
	if(!empty($posts)) { 
	foreach($posts as $k=>$v) {
	  ?>
	  <tr class="table-row" id="table-row-<?php echo $posts[$k]["id"]; ?>">
		<td contenteditable="true" onBlur="saveToDatabase(this,'users_name','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["users_name"]; ?></td>
		<td contenteditable="true" onBlur="saveToDatabase(this,'users_num_secu','<?php echo $posts[$k]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[$k]["users_num_secu"]; ?></td>
		<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["id"]; ?>);">Delete</a></td>
	  </tr>
	  <?php
	}
	}
	?>
  </tbody>
</table>

</div>