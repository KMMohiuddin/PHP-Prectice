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
    <?php 
    $nameErr = $phoneErr = $ageErr = "";
    $name = $phone = $age = $country = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
      
      if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
      } else {
        $phone = test_input($_POST["phone"]);
      }
    
      if (empty($_POST["country"])) {
        $country = "";
      } else {
        $country = test_input($_POST["country"]);
      }
    
      if (empty($_POST["age"])) {
        $ageErr = "age is required";
      } else {
        $age = test_input($_POST["age"]);
      }
    }
    
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
    <form class="" action="get_set.php" method="post">
        Name <input type="text" name="name" value="">
        Phone Number <input type='number' name="phone" value="">
        Age <input type="number" name="age" value="">
        Country <input type="text" name="country" value="">
        <input type="submit" name="submit" value="submit">
        <?php
        $conn= mysqli_connect("localhost","root","","class3");
        $sql = "INSERT INTO `details` (`name`, `Phone`, `age`, `Country`) VALUES ('$name', '$phone', '$age', '$country')";
        //$result= mysqli_query($conn, $sql);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }else{
          echo "connected";
        }
        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);


        
        ?>
    </form>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>phone</th>
        </tr>
        <tr><?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Class3";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "SELECT * FROM `details`";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>".$row["name"]."</td>";
  echo "<td>".$row["Phone"]."</td>";
  echo"<td>".$row["age"]."</td>";
  echo "<td>".$row["Country"]."</td>";
  echo "</tr>";
  }
}
  else {
    echo "0 results";
  }
  
  $conn->close();
  ?></tr>
    </table>
</body>

</html>