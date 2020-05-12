<?php

session_start();
include 'locdb.php';
?>

<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>CMS Admin Page</title>
		
                         <script
                         src="https://code.jquery.com/jquery-3.4.1.min.js"
                         integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                         crossorigin="anonymous"></script>
                                  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" 
								  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
								  crossorigin="anonymous">
                                 <link href="css/home.css" rel="stylesheet" type="">
										 </head>
                                               <body>
									        <form action="logout.php">
                                <input type="submit" id="logout" value="Log Out">
                         </form>
<ul>
<li>Welcome - <?php echo $_SESSION['name']?> | </li>
<li>Charting</li>
<li>Buy and Sell history</li>
<li>Currency Converter</li>
</ul>
</div>
											<br>
										<br>
<br><br>										
						
<?php
//process.php
  
  $id = 0;
  $update = false;
  $title= '';
  $author = '';
  $content = '';

  if(isset($_POST['save'])){
	 $title = $_POST['title'];
	 $author = $_POST['author'];
	 $content = $_POST['content'];
	
	 $conn->query("INSERT INTO data (title,author,content) VALUES ('$title', '$author', '$content')")or 
	  die($conn->error);
	  
	 $_SESSION['message'] = "Article has been saved";
	 $_SESSION['msg_type'] = "success";
	 
	 header("location: home.php");
	
}
    if(isset($_GET['delete'])){
	 $id = $_GET['delete'];
	 $conn->query("DELETE FROM data WHERE id=$id") or die($conn->error());
	 
	  $_SESSION['message'] = "Article has been deleted";
	  $_SESSION['msg_type'] = "danger";
	  
	 header("location: home.php");
	}
	
	 if(isset($_GET['edit'])){
	 $id = $_GET['edit'];
	 $update = true;
     $result = $conn->query("SELECT * FROM data WHERE id=$id") or die($conn->error());
	 if (count($result)==1){
		 $row = $result->fetch_array();
		 $title = $row['title'];
		 $author = $row['author'];
		 $content = $row['content'];
	 }
}
    
	 if(isset($_POST['update'])){
	 $id = $_POST['id'];
	 $title = $_POST['title'];
	 $author = $_POST['author'];
	 $content = $_POST['content'];
	 
	 $conn->query("UPDATE data SET title = '$title',author= '$author',content= '$content' WHERE id=$id") 
	 or die($conn->error());
	 
	  $_SESSION['message'] = "Article has been updated";
	  $_SESSION['msg_type'] = "warning";
	  
	  header("location: home.php");
		 	 
	 }
	 //end process.php
	?>
																	
<?php 
if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
<?php endif ?>

<div class="container">
<?php 
$mysqli = new mysqli('localhost','root','','crudcms') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
?>

<div class="row justify-content-center">
         <table class="table">
                 <thead>
                 <tr>
	             <b><th>Title</th></b>
	             <b><th>Author</th></b>
				 <b><th>Content</th></b>
	             <th colspan="2">Action</th>
	             </tr>
	             </thead>
<?php
while ($row = $result-> fetch_assoc()):?>
<tr>
<td><?php echo $row['title'];?></td>
<td><?php echo $row['author'];?></td>
<td><?php echo $row['content'];?></td>
<td>

<a href="home.php?edit=<?php echo $row['id'];?>"
class="btn btn-info">Edit</a>
<a href="process.php?delete=<?php echo $row['id'];?>"
class="btn btn-danger">Delete</a>
</td>
</tr>
<?php endwhile; ?>

</table>
</div>

<?php
function pre_r($array ){
	echo '<pre>';
	print_r($array);
	echo '<pre>';
	print_r($array);
	echo '<pre>';


}	
?>

<div class="row justify-content-center">
         <form action="process.php" method="POST">

         <input type="hidden" name="id" value="<?php echo $id;?>">

                 <div class="form-group">
                 <label>Title</label>
                     <input type="text" name="title" class="form-control" value="" placeholder="Enter Title" required aria-required = "true">
                          </div><span>
                 <div class="form-group">
                 <label>Author</label>
                         <input type="text" name="author" class="form-control" value="" placeholder="Author" required aria-required = "true">
                          </div>
				   <div class="form-group">
				  <label for="subject">Content</label>
                         <input type="text" name="content" class="form-control" value="" placeholder="Content" required aria-required = "true">
				          </div>
                 <div class="form-group">
<?php 
if ($update== true):
?>
                 <button type="submit" class="btn btn-info" name="update">Update</button>
                         <?php else: ?>
                 <button type="submit" class="btn btn-primary" name="save" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >Save</button>
                         <?php endif; ?>
                         </div>
                     </form>
                 </div>
             </div>
			<a class="goto" href="front.php"> Go to main page</a> 
         </body>
     </html>