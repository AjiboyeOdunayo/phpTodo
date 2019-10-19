<?php
require('connection.php');
// define the session variable id
if(isset($_GET['id'])){
  $_SESSION['id'] = $_GET['id'];
  $id = $_SESSION['id'];
}
else{
  $id = $_SESSION['id'];
}
// delete statements start here
$query = "DELETE FROM `users` WHERE `ID` = '$id'";
// run your query
$url = 'select.php';
if(mysqli_query($connection,$query)){
  // redirect to select.php
  header('Location: '.$url);
}
else{
  echo "Failed to delete";
}




 ?>
