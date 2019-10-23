<?php
$server_name = "localhost";
$username = "root";
$password = "";
$dbname ="registration";
// if the connections fall it output an error message
$connection = mysqli_connect($server_name,$username,$password,$dbname);
session_start();
echo "Welcome " . $_SESSION['name'];
if (empty($_SESSION["userid"]) || $_SESSION["loggedin"] !== true) {
    echo "<script>alert('Not loggedin')</script>";
    ?>
    <script>
        window.location="login.php";
    </script>
    <?php
}else {
    // require('connection.php' );

    $userid = $_SESSION["userid"];
    // echo "<script>alert('Loggedin')</script>";
    // echo "" . $userid;
    if (isset($_POST['submit'])) {
      $task = $_POST["task"];

      $query = "INSERT INTO todo (task, userid) VALUES('$task', '$userid')";

      if ($connection -> query($query) === TRUE ) {
        echo "<script>alert('Inserted')</script>";

      }else {
        // echo "<script>alert('Cannot insert')</script>";
        echo " cannot insert" . $connection->error;
      }
      // header('Location: todo.php');
    }
}



// $tasks=mysqli_query($connection, "SELECT * FROM task");




 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="todo.css">
   </head>
   <body>
     <div class="heading">
       <h3>Todo System</h3>
     </div>
      <!-- <a href="reg.php">Registration</a>
     <a href="login.php">Login</a> -->

     <a href="logout.php">Logout</a>
  <form action="todo.php" method="POST">
    <input type="text" name="task" class="task_input" placeholder="Enter your todo"/>
    <button type="submit" class="task_button" name="submit" title="Add Task">Add todo</button>

  </form>
  <table>
  <!-- <style="border-collapse: collapse" table border="" width="70%"; height="";> -->

        <thead>
          <th>id</th>
          <th>task</th>
          <th>userid</th>
          <th>Action</th>
        </thead>

    <?php

 // $query = "SELECT * FROM `todo` WHERE `userid` = '$userid';"
 // $connect =
   $query = "SELECT * FROM todo WHERE userid = '$userid'";
   $result = mysqli_query($connection,$query);
   if(mysqli_num_rows($result) > 0) {$i =1;
     while($data = mysqli_fetch_assoc($result)){
        // echo "my user id is" . $data['userid'];
      $id =  $data['id'];
      $task = $data['task'];
      $uid = $data['userid'];

  ?>


      <tbody>

        <tr>
          <td><?php echo $i;  ?></td>
          <td><?php echo $task;  ?> </td>
          <td><?php echo $userid;  ?></td>
          <td><a href="ed.php">Edit</a></td>
          <td><a href="del.php">delete</a></td>

          <!-- <td><a href="ed.php">Edit</a></td> -->
        </tr>
      <tbody>

        <?php
            $i++;
             }
           } ?>
  </table>



  <!-- <table class="table table-borderless table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->


   </body>
 </html>
