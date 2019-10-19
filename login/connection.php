<?php
// session_start();

$server_name = "localhost";
$username = "root";
$password = "";
$dbname ="registration";
// if the connections fall it output an error message
$connection = mysqli_connect($server_name,$username,$password,$dbname);

// query into the database
// mysqli_query()
// $query="INSERT INTO `Baby`(`id`,`first name`,`last name`) VALUES (NULL,'Odunayo','patience')";
// if(mysqli_query($connection,$query)){
//   echo "name inserted succesfully";
// }
// else{
//   echo "fail to insert";
// }
//
// $query="INSERT INTO `Baby`(`id`,`first name`,`last name`) VALUES (NULL,'okawari','Terry')";
// if(mysqli_query($connection,$query)){
//   echo "name inserted succesfully";
// }
// else{
//   echo "fail to insert";
// }
//
//
//
//
// mysqli_close($connection);

?>
