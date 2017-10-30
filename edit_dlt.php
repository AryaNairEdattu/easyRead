<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</head>
<body >
<div id=header style="height:20%;width:65%;float:right" >

    <img src="https://testcentre.org.uk/wp-content/uploads/2014/09/logo-abebooks-2.jpg" height="100%" width="25%" align="middle" >

    <font size="6">easyRead</font>
</div>

<div id=sub1 style="height:100%;width:100%;float:right;color:" >
    <div style="background-color:#FABBCF;width:100%;height:100%">
    <br></br>
    <div class="container">
        <h2>easyRead</h2><br></br>

    <div>
    <form action="" method="post">
        <label >book id</label>
        <input type="text" class="form-control" name="id" >
        <label >book name</label>
        <input type="text" class="form-control" name="book_name" >
        <label >author</label>
        <input type="text" class="form-control" name="author" >
        <label >publisher</label>
        <input type="text" class="form-control" name="publisher" >
        <label >total books</label>
        <input type="text" class="form-control" name="total_books" >
        <label >available books</label>
        <input type="text" class="form-control" name="available_books" >
        <label >category</label>
        <input type="text" class="form-control" name="category" >
        <label >rack id</label>
        <input type="text" class="form-control" name="rack_id" >
        <br></br>
        <input type="submit" name="Edit" value="edit">
       

    </form>
    </div>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['Edit']) {
$servername = "localhost";
$username = "root";
$password = "inapp";
$dbname = "easyRead";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}else{

//echo "Connected successfully";
$id=$_POST['id'];
$book_name =$_POST['book_name'];
$author =$_POST['author'];
$publisher =$_POST['publisher'];
$total_books =$_POST['total_books'];
$available_books =$_POST['available_books'];
$rack_id =$_POST['rack_id'];
//$sql="INSERT INTO tbl_books(book_name,author,publisher,total_books,avilable_books,rack_id) VALUES ('$book_name','$author','$publisher','$total_books','$available_books','$rack_id')";
//echo $sql;
$sql="UPDATE tbl_books SET book_name='{$book_name}',author='{$author}',publisher='{$publisher}',total_books='{$total_books}',avilable_books='{$available_books}',rack_id='{$rack_id}' WHERE id='{$id}'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Invalid Data";
    
}
}
}
?>