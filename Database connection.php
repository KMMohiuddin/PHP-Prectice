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
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Age</th>
            <th>Country</th>
        </tr>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Class3";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "SELECT * FROM `details`";

if ($conn->query($sql) === TRUE) {
  echo "Added successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
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
  ?>
    </table>
</body>

</html>