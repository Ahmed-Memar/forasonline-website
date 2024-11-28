 <?php include_once("dbConnect.php");?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="adminname" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{
			$adminname = mysqli_real_escape_string($mysqli, $_POST['user']);
			$password = mysqli_real_escape_string($mysqli, $_POST['pass']);
			
			$query 		= mysqli_query($mysqli, "SELECT * FROM login WHERE  password='$password' and adminname='$adminname'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
			
			if ($num_row > 0) 
				{			
					header('location:admincontrol.php');					
				}
			else
				{
					echo 'Invalid adminname and Password Combination';
				}
		}
  ?>

  
</div>

</body>
</html>