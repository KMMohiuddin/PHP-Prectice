<?php
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