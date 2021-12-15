<?php
session_start();
include_once "connection.php";
$email=$_POST["email"];
$password=$_POST["password"];
$sql="select * from admin where email='$email' and password='$password'";
$result= mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
     echo "He is an authenticate user. His id is: ". $row['a_id'];
     $_SESSION["admin_id"] = $row['a_id'];
     header("Location: home.php");
  }
}else{
  echo "He is not an authenticate user";
  header("Location: index.php");
}

 ?>
