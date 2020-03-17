<?php

include_once('includes/connections.php');
include_once('includes/article.php');

$article = new Article; 
 
 if (isset($_GET['id'])){
	 $id = $_GET['id'];
	 $data = $article->fetch_data($id);
?>
 <html>
     <head>
         <title>My CMS</title>
         <link rel="stylesheet" href="css/stylecms.css"/>
     </head>
<body>
         <div class="container">
         <a href="index.php" id="logo">CMS</a>
		 
     <ol>
	     <?php echo $data['article_title']; ?>	
         <?php echo $data['article_content']; ?>			 
    -<small>
          posted <?php echo date('l jS', $article['article_timestamp'])?>			
                         </small>
                     </li>
                 <?php } ?>
             </ol>
         </div>
     </body>
</html> 
<?php
 } else {
	header('Location: index.php');
	exit();
 }
?>