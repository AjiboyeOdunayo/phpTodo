<?php
 // require('todo.php');
 require('connection.php');
 // define the session variable id
 if(isset($_GET['id'])){
   $_SESSION['id'] = $_GET['id'];
   // $id = $_SESSION['id'];
 // }
 // else{
    $id = $_GET['id'];
 // }






 // get the data of the user using the id
 $query = "SELECT  FROM `todo` WHERE `id` = '$id'";
 $result = mysqli_query($connection,$query);
 if(mysqli_num_rows($result) > 0){
   while($data = mysqli_fetch_assoc($result)){
      $id =  $data['id'];
     // echo "id";
     $task = $data['task'];
      $userid = $data['userid'];

   }
 }
 else{
   echo "record not found";
 }
 // performing the update task
 // check whether the update button has been set
 if(isset($_POST['update'])){
   $task = htmlspecialchars(strip_tags(trim($_POST['task'])));

   if(empty($task)){
     $error[] = "fill the require";
   }

     if(strlen($task)){
       $error[] = "too sort";
     }
     if (!empty($error)) {
    echo "error";
     }

  else{
    // update the data in the database
    $update = "UPDATE `todo` SET task = '$task' WHERE id = '$id'";
    // -- `EMAIL` = '$email',`PHONE` = '$phone',`ADDRESS` = '$address' WHERE
    // -- `ID` = '$id'
    // run your query
    // $url = 'todo.php';
    if(mysqli_query($connection,$update)){
      // it redirects the user to select.php
    $url = 'todo.php';
      header('Location: '.$url);
    }
    else {
      echo "Failed to update";
    }
  }
 }
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form  method="POST">
      <input type="text" name="id"  value="<?php echo $id ?>"><br>
      <input type="text" name="task"  value="<?php echo $task ?>" tittle="edit" <br>
      <input type="submit" name="update"  value="update">
      

    </form>
  </body>
</html>
