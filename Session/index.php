<?php

$conn = mysqli_connect("localhost","root", "", "web_practice");
if(isset($_POST["submit"])){
  $name = $_POST["student_name"];
  $age = $_POST["student_age"];
  $email= $_POST["student_email"];

  $conn = mysqli_connect("localhost","root", "", "web_practice");

  $sql = "insert into student (name,age,email) values ('$name',$age,'$email')";

  mysqli_query($conn, $sql);

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <form class="" action="index.php" method="post">
      name <input type="text" name="student_name" value="">
      Age <input type="number" name="student_age" value="">
   Email <input type="email" name="student_email" value="">
   <input type="submit" name="submit" value="submit">



    </form>
    <table class="table table-bordered">
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      <?php
         $sql="select * from student";
         $result= mysqli_query($conn, $sql);
         if(mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
             echo "<tr>";
             echo "<td>".$row["name"]."</td>";
             echo "<td>".$row["age"]."</td>";
                 echo "<td>".$row["email"]."</td>";
                 echo "<td><a class='btn btn-primary' href='view_edit.php?id=".$row["s_id"]."'>Edit</a><a class='btn btn-danger' href='delete.php?id=".$row["s_id"]."'> Delete</a></td>";
             echo "</tr>";
           }
         }else{
           echo "There is no data";
         }
       ?>
    </table>
  </body>
</html>
