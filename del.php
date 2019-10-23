<?php
require('todo.php');
// define the session variable id

if(isset($_GET['id'])){
  $_SESSION['id'] = $_GET['id'];
  $id = $_SESSION['id'];
}
else{
  $id = $_SESSION['id'];
}
// delete statements start here
$query = "DELETE FROM `todo` WHERE `task` = '$task'";

// run your query
$url = 'todo.php';
if(mysqli_query($connection,$query)){
  // redirect to select.php
  header('Location: '.$url);
}
else{
  echo "Failed to delete";
}




 ?>
