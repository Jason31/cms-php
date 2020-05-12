<?php 
include 'locdb.php';
?>

<html>
<head>
<title>Front page</title>
<div class = "container">
<?php 
$mysqli = new mysqli('localhost','root','','crudcms') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
?>

<div class="row justify-content-center">
<?php
while ($row = $result-> fetch_assoc()):?>
<?php echo $row['title'];?><br><br>
<?php echo $row['author'];?><br><br>
<?php echo $row['content'];?><br><br>
<?php endwhile; ?>

</div>
</html>