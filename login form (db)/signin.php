<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body  style="color:white;font-weight: bold;margin: 100px;" class='body'>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="lab3_2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$entered_pass=$_POST['password'];

$sql = "SELECT* from user where email='".$_POST['email']."' and password= md5('".$entered_pass."')";
$sql1= "SELECT* from department;";
$result = $conn->query($sql);
$result1=$conn->query($sql1);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "welcome: " . $row["name"] . "<br>";
        while($row = mysqli_fetch_assoc($result1)) {
            echo "<br> dep_Name: " . $row["dep_name"]."<br>  Description: " . $row["description"]."<br>";
          }

        
    }
} else {

include('login.html');
$msg='Email or password is incorrect!';
echo '<p style="color:white;font-weight: bold;margin: 100px;">'.$msg.'</p>';


}

    $conn->close();
?>
</body>
</html>