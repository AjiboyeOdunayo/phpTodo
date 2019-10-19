<?php
// login the user
require('connection.php');

if(isset($_POST['login'])){
  // perform form validations
  $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
  $password = htmlspecialchars(strip_tags(trim($_POST['password'])));

  $password = md5($password);

  $query = "SELECT * FROM `users` WHERE `EMAIL` = '$email' AND `PASSWORD` = '$password'";
  $result = mysqli_query($connection,$query);
  if(mysqli_num_rows($result) == 0){
    echo "Authentication failed";
  }
  else{
    while($data = mysqli_fetch_assoc($result)){
      $id = $data['ID'];
      $name = $data['NAME'];
      $email = $data['EMAIL'];
      session_start();
      $url = 'todo.php';
      $_SESSION['loggedin'] = true;
      $_SESSION['userid'] = $id;
      $_SESSION['name'] = $name;
      $_SESSION['email'] = $email;
    }

      	if(isset($_SESSION['userid'])){
      header('Location: '.$url);
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
     <form class="" action="login.php" method="post">
       <div class="">
         <label for="">Email</label>
         <input type="email" name="email" value="">
       </div>
       <div class="">
         <label for="">Password</label>
         <input type="password" name="password" value="">
       </div>
       <div class="">
         <input type="submit" name="login" value="Login">
         <a href="reg.php">Not a user? Register here </a>
        <!-- <input type="submit" name="register" value="register"> -->

       </div>
     </form>
   </body>
 </html>
