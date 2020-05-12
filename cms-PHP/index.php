<!---BETA VERSION MORE STYLING IS NEEDED,ADD MORE FUNCTIONALITY LAST SEEN, 4/10/20-->
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='css/style.css' />
<title>My CMS</title>
</head>
<body>

<div id="main">
 
	<h2>Log in here</h2>
	
	<form action ="login.php" method="post">
	<label><b>Username:</b></label>
	<input type="text" class="form-control" name="uname" placeholder="User name" required aria-required = "true"><br><br>
	<label><b>Password:</b></label>
	<input type="text" class="form-control" name="pass" placeholder="Password" required aria-required = "true"><br><br>
	<button type="submit" class="send-button"><b>Log in</b></button>
	</form>
	
	<form action ="signup.php" onsubmit="myFunction()" method="post">
	
	<h2>Create your Account</h2>
	<label><b>Username:</b></label>
	<input type="text" class="form-control"  name="uname" placeholder="User name" required aria-required = "true">
	<br><br>
	
	<label><b>Email Add:</b></label>
	<input type="email"  class="form-control"  name="email" placeholder="Email" required aria-required = "true" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$">
	<br><br>	
	
	<label><b>Password:</b></label>
	<input type="text" id="password"  class="form-control" name="Password" placeholder="Password" required aria-required = "true"  >
	 <input type="text"  class="form-control" placeholder="Confirm Password" id="confirm_password" required aria-required="true">
	<br><br>
	<button type="submit" class="send-button"><b>Sign Up</b></button>
	</div>
	
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/passcon.js"></script>
<script type="text/javascript" src="js/onsubmit.js"></script>



	
	       </form>
     </body>
</html>

	
	
   