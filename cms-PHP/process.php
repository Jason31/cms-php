  <?php
  
  /*session message alert*/
  session_start();
  include 'locdb.php';
  
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
	?>

  