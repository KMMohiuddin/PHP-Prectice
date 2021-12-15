<?php
$conn=mysqli_connect("localhost","root","");
$sql= "CREATE DATABASE 2894Quiz3";

if(mysqli_query($conn,$sql)){
    echo "Database created Successfully.";
}else{
echo "database not created or already created";
}
?>