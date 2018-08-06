<?php
require_once("dbcontroller.php");
$db_handle = new DBController();


$conn=mysqli_connect("localhost","root","Koal@1603","pupuce");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(!empty($_POST["users_name"])) {

	// escape variables for security
	$name = mysqli_real_escape_string($conn, strip_tags($_POST["users_name"]));
	$secu = mysqli_real_escape_string($conn, strip_tags($_POST["users_num_secu"]));

	$sql = "INSERT INTO users (users_name,users_num_secu) VALUES ('" . $name . "','" . $secu . "')";
	$faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from users WHERE id = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
	if (!mysqli_query($conn,$sql)) {
		die('Error: ' . mysqli_error($conn));
	  }

	  
mysqli_close($conn);
?>
<tr class="table-row" id="table-row-<?php echo $posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'users_name','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["users_name"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'users_num_secu','<?php echo $posts[0]["id"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["users_num_secu"]; ?></td>
<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["id"]; ?>);">Delete</a></td>
</tr>  
<?php } ?>