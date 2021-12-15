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

?>