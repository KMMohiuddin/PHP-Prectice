
   
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
        Name <input type="text" name="name" value="">
        Phone Number <input type='number' name="phone" valie="">
        Age <input type="number" name="age" value="">
        Country <input type="text" name="country" value="">
        <input type="submit" name="submit" value="submit">
    </form>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
        </tr>
    </table>
</body>

</html>
<?php 
    if(isset($_POST["submit"])){
        $name= $_POST["name"];
        $phone=$_POST["phone"];
        $age=$_POST["age"];
        $country=$_POST["country"];
    $conn= mysqli_connect("localhost","root","","Class3");
    $sql= "INSERT INTO `details` (`name`, `Phone`, `age`, `Country`) VALUES ('$name', '$phone', '$age', $country)";
    mysqli_query($conn,$sql);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    //$mysqli -> close();
    mysqli_connect-> close();

    }
    ?>