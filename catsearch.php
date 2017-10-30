<html>

<div id=header style="height:20%;width:65%;float:right" >

<img src="https://testcentre.org.uk/wp-content/uploads/2014/09/logo-abebooks-2.jpg" height="100%" width="25%" align="middle" >

<font size="6">easyRead</font>
</div>

<div id=sub1 style="height:80%;width:100%;float:right;color:" >
<form action="" method="post" style="text-align:center">
<input type="text" name="search_value" placeholder="Search..">
<br></br>
<input type="submit" name='search' value="search">
</form>

<?php
$servername ="localhost";
$db_username = "root";
$db_password = "inapp";
$db_name="easyRead";
$conn = new mysqli($servername, $db_username,$db_password,$db_name);// Check connection
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["search"]) {
    $books = test_input($_POST["search_value"]);
    $qc = "SELECT BK.*,CAT.categories FROM tbl_books as BK LEFT JOIN tbl_categories CAT ON (CAT.id = BK.rack_id) WHERE BK.book_name LIKE '$books%'";    
    $result = $conn->query($qc);
    
    if ($result->num_rows > 0) {
       // echo 'success';
        $row = $result->fetch_assoc();
        //echo '<pre>';
        //var_dump($row);
        //echo '</pre>'; 
        echo 'The searched book   ';
        echo  $row['book_name'];  
        echo '  is in rack   ';     
        echo  $row['rack_id'];
        //header('location:booklist.php');
    }
    else{
        echo ( "<h2 >result not found</h2>");
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

</div>


</body>

</html>