<?php
session_start();
if(!isset($_SESSION["admin_id"])){
  header("Location:index.php");
}
if(isset($_POST["submit"])){
  $Num = $_POST["value1"];

  if ($Num % 2 == 0){
    echo $Num." is an even number.";
  } else{
    echo $Num." is an odd number.";
  }
}

?>
