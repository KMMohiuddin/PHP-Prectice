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
        <input ype="text" name="name" value="" placeholder="name">
        <input type="submit" class="btn btn-outline-info" name="submit" value="search">
        <input type="text" name="country" value="" placeholder="country">
        <input type="submit" class="btn btn-outline-info" name="submit" value="search">
    </form>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>phone</th>
            <th>Age</th>
            <th>Country</th>

        </tr>
        <tr><?php
            $name = $country ="";
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Class3";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $name = $country = "";

            if (!empty($_POST["name"])) {
               // $name = test_input($_POST["name"]);
               $name = $_POST["name"];
              }
            if (!empty($_POST["country"])) {
               // $country = test_input($_POST["country"]);
               $country = $_POST["country"];
              }
             /* function test_input($data)
              {
                  $data = trim($data);
                  $data = stripslashes($data);
                  $data = htmlspecialchars($data);
                  return $data;
              }*/
            // sql to create table
            $sql = "SELECT * FROM `details` WHERE Country='$country' OR name ='$name'";
            $result = mysqli_query($conn,$sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["Phone"] . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo "<td>" . $row["Country"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
                echo $name;
                echo $country;
            }

            $conn->close();
            ?></tr>
    </table>
</body>

</html>