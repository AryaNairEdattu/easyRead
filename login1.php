<?php

 echo "Connected successfully";
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["login"]&& $_POST["type"]) {


     //echo "WELCOME  ",$_POST["type"];

    if($_POST["type"]==2){
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    //echo  $username. $password;
    $qu = " SELECT * from tbl_user WHERE username='$username' and password='$password' ";
    //echo    $conn;   
    $result = $conn->query($qu);
    if ($result->num_rows > 0) {
        //echo "WELCOME  ". $_POST["username"];
        header('location:userpage.php');
    }
    else{
        echo ( "<h2 >Invalid username/Password</h2>");
        echo ($result);
    }
    $conn->close();
}else{
    echo "member  ",$_POST["type"];
    $s_username = test_input($_POST["username"]);
    $s_password = test_input($_POST["password"]);
    //echo  $username. $password;
    $qs = " SELECT * from tbl_staff WHERE s_username='$s_username' and s_password='$s_password' ";
    //echo    $conn;   
    $result = $conn->query($qs);
    if ($result->num_rows > 0) {
        //echo "WELCOME  ". $_POST["username"];
        header('location:staff_page.php');
    }
    else{
        echo ( "<h2 >Invalid username/Password</h2>");
        echo ($result);
    }
    $conn->close();
}
}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>