<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <button type="button" class="btn btn-success btn-lg" onclick="functionOutput()" id="CreateDB">Create Database</button>
    <button type="button" class="btn btn-success btn-lg" onclick="functionOutput()" id="CreateDT">Create Table </button>
    <button type="button" class="btn btn-success btn-lg" onclick="functionOutput(),formHideUnhide()" id="dataInsert">Insert Data</button>
    <button type="button" class="btn btn-success btn-lg" onclick="functionOutput(),dbHideUnhide()" id="dataView">view Entire Database</button>
    <p id="demo"></p>
    <script src="Button.js"></script>
    
    <form id="form" class="" action="index.php" method="post">
        Name <input type="text" name="name" value="">
        Phone Number <input type='number' name="phone" value="">
        Age <input type="number" name="age" value="">
        Country <input type="text" name="country" value="">
        <input type="submit" name="submit" value="submit">
        <?php 
                  
        if(isset($_POST["submit"])) {
          $nameErr = $phoneErr = $ageErr = "";
          $name = $phone = $age = $country = "";
          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
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
          
          }
          $conn= mysqli_connect("localhost","root","","2894Quiz3");
          $sql = "INSERT INTO `client` (`Name`, `PhoneNumber`, `Age`, `Country`) VALUES ('$name', '$phone', '$age', '$country')";
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
        }

?>  
    </form>
    <table class="table table-bordered" id="databaseTable">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>phone</th>
            <th>country</th>
        </tr>
        <tr><?php
$conn= mysqli_connect("localhost","root","","2894Quiz3");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "SELECT * FROM `client`";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>".$row["Name"]."</td>";
  echo "<td>".$row["PhoneNumber"]."</td>";
  echo"<td>".$row["Age"]."</td>";
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
