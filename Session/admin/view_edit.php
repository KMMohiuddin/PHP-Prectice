<?php
include_once "checking.php";
 $id=$_GET["id"];
   $sql="select * from student where s_id=$id";
   $conn = mysqli_connect("localhost","root", "", "web_practice");
   $result= mysqli_query($conn, $sql);
   if(mysqli_num_rows($result)>0){
     while($row=mysqli_fetch_assoc($result)){
      $name=$row["name"];
      $age=$row["age"];
      $email=$row["email"];
     }
   }else{
     echo "There is no data";
   }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="edit_done.php" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      name <input type="text" name="student_name" value="<?php echo $name; ?>">
      Age <input type="number" name="student_age" value="<?php echo $age; ?>">
   Email <input type="email" name="student_email" value="<?php echo $email; ?>">
   <input type="submit" name="submit" value="submit">



    </form>
  </body>
</html>
