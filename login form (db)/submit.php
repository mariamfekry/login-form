<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body style="color:white;font-weight: bold;margin: 100px;" class='body'>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="lab3_2";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email_flag=0; // 0 if there's no duplicates
$new_pass=$_POST['password'];
$sql2= "SELECT email from user;";
$result2=$conn->query($sql2);

while($rows = mysqli_fetch_assoc($result2)){
  if($_POST["email"] == $rows['email']){
    $email_flag=1;
    echo"<br>"."Email already exist"."<br>";
    echo '<a href="register.html"  style="color:white;font-weight: bold;margin: 100px;">'.'back'.'</a>';
  } 
}

if($email_flag != 1){
$sql = "INSERT INTO user (name, email, password)
VALUES ('".$_POST["name"]."','".$_POST["email"]."', md5('".$new_pass."'));";

$sql1= "SELECT* from department;";
$result1=$conn->query($sql1);

if ($conn->query($sql) === TRUE) {
    echo "<br >".'Registered successfully'."<br>";
    echo "welcome: " . $_POST["name"] . "<br>";
    while($row = mysqli_fetch_assoc($result1)) {
      echo "<br > dep_Name: " . $row["dep_name"]."<br>  Description: " . $row["description"]."<br>";
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }}
$conn->close();
?></body>
</html>