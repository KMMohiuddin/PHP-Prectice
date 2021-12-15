<?php
$conn=mysqli_connect("localhost","root","","2894Quiz3");
$sql= "CREATE table user (
    Name varchar(255),
    PhoneNumber int,
    Age int,
    Country varchar(255)
)";
if(mysqli_query($conn,$sql)){
    echo "table creatred successfully";
}else{
    echo "table Already created";
}
?>
