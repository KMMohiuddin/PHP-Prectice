<?php
include_once "checking.php";
if(isset($_POST["submit"])){
$id=$_POST["id"];
$name = $_POST["student_name"];
$age = $_POST["student_age"];
$email= $_POST["student_email"];
$conn = mysqli_connect("localhost","root", "", "web_practice");
$sql="update student set name='$name', age=$age, email='$email' where s_id=$id";
if(mysqli_query($conn, $sql)){
  header("Location: index.php");
}

}


 ?>
