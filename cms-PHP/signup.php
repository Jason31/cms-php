<?php
include 'locdb.php';
 

$uname = $_POST['uname'];
$email = $_POST['email'];
$pass = $_POST['Password'];


$sql="insert into signup(username,email,password)
values('$uname','$email','$pass')";
$result= $conn->query($sql);

header("Location:index.php");


?>