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






 // get the data of the user using the id
 $query = "SELECT * FROM `users` WHERE `ID` = '$id'";
 $result = mysqli_query($connection,$query);
 if(mysqli_num_rows($result) > 0){
   while($data = mysqli_fetch_assoc($result)){
     $name = $data['NAME'];
     $email = $data['EMAIL'];
     $phone = $data['PHONE'];
     $address = $data['ADDRESS'];
   }
 }
 // performing the update task
 // check whether the update button has been set
 if(isset($_POST['update'])){
   $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
   $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
   $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
   $address = htmlspecialchars(strip_tags(trim($_POST['address'])));
   if(empty($name) || empty($email) || empty($phone) || empty($address)) {
     $error[] = "Required field must not be left empty";
   }
     if(strlen($name) < 3){
       $error[] = "name is too short";
     }

     if(strlen($phone) < 11 || strlen($phone) > 14){
       $error[] = "phone number is invalid";
     }
     if(strlen($address) < 10){
       $error[] = "Address must be descriptional";
     }
 // check if the error array is empty
 if(!empty($error)){
   foreach($error as $item){
     echo "<li>".$item."</li><br>";
   }
  }
  else{
    // update the data in the database
    $update = "UPDATE `users` SET `NAME` = '$name',
    `EMAIL` = '$email',`PHONE` = '$phone',`ADDRESS` = '$address' WHERE
    `ID` = '$id'";
    // run your query
    $url = 'select.php';
    if(mysqli_query($connection,$update)){
      // it redirects the user to select.php
      header('Location: '.$url);
    }
    else {
      echo "Failed to update";
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
     <form action="edit.php" method="post">
       Name:<input type="text" name="name" value="<?php echo $name ?>"><br>
       Email:<input type="text" name="email" value="<?php echo $email ?>"><br>
       Phone number:<input type="text" name="phone" value="<?php echo $phone ?>"><br>
       Address:<input type="text" name="address" value="<?php echo $address ?>"><br>
       <input type="submit" name="update" value="Update">
     </form>
   </body>
 </html>
