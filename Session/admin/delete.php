<?php
include_once "checking.php";
$id=$_GET["id"];
$sql="delete from student where s_id=$id";
$conn = mysqli_connect("localhost","root", "", "web_practice");
if(mysqli_query($conn, $sql)){
  header("Location: index.php");
}

 ?>
