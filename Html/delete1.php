<?php
//delete.php
if(isset($_POST["id"]))
{
	require_once('php/connect.php');
 $query = "
 DELETE from event WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}
?>
