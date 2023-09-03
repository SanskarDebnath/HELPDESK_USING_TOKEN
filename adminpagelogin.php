<?php
include "server.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Log IN Page</title>
	<style>
		body {
			background-color: #f1f1f1;
		}
		
		form {
			background-color: #ffffff;
			border-radius: 5px;
			padding: 20px;
			box-shadow: 0px 0px 10px #d3d3d3;
			width: 400px;
			margin: 50px auto;
		}
		
		h2 {
			text-align: center;
			margin-bottom: 20px;
		}
		
		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}	
		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}		
		button:hover {
			background-color: #45a049;
		}		
		.container {
			padding: 16px;
			background-color: silver;
		}		
		span.password {
			float: right;
			padding-top: 16px;
		}		
		@media screen and (max-width: 600px) {
			form {
				width: 100%;
			}
		}
#adminsign {
  background-color: #4CAF50;
  border: none; 
  color: white; 
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px; 
  margin: 10px; 
  cursor: pointer;
  border-radius: 4px;
}
#adminsign:hover {
  background-color: #3e8e41; 
}
#adminlogin {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
}

#adminlogin:hover {
  background-color: #45a049;
}

</style>
</head>
<body>
	<form action="adminpage.php?admin=5" method="POST">
		<h2>Admin Log in</h2>

		<?php 
if(isset($_REQUEST["err"]))
    if($_REQUEST["err"] == 1)
	    $msg="Username and password are not matched with required details";
?>
<p style="color:red;">
<?php
if(isset($msg)){
    echo $msg;
}
?>
		<div class="container">
			<label for="id"><img src="./img/user.svg"></label>
			<input type="text" name="uid" placeholder="Enter the ID here" required>
			<label for="pasw"><img src="./img/key.svg"></label>
			<input type="password" name="pasw" placeholder="Enter the password here" required>
			<br>
		<input type="submit" name="logged" id="adminlogin" value="Log in"></input>
		<br>
		</div>
	</form>

</body>
</html>