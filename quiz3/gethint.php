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