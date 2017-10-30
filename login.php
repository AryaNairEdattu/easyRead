<?php

$servername ="localhost";
$db_username = "root";
$db_password = "inapp";
$db_name="easyRead";
$conn = new mysqli($servername, $db_username,$db_password,$db_name);// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    //echo "Connected successfully";
}


//process request
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["login"]) {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    //echo  $username. $password;
    $qs = " SELECT * from tbl_user WHERE username='$username' and password='$password' ";
    //echo    $conn;   
    $result = $conn->query($qs);
    if ($result->num_rows > 0) {
        //echo "WELCOME  ". $_POST["username"];
        header('location:userpage.php');
    }
    else{
        echo ( "<h2 >Invalid username/Password</h2>");
        echo ($result);
    }
    $conn->close();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>