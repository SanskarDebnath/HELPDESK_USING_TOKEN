<?php
include "server.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
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
			background-color: paleturquoise;
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
</style>
</head>
<body>
	<form action="adminpage.php?admin=4" method="POST">
		<h2>Sign Up</h2>
		<div class="container">
			<label for="fname"><b>Full name</b></label>
			<input type="text" placeholder="Enter First Name" name="full_name" required>

            <label for="fname"><b>Email</b></label>
			<input type="text" placeholder="eg. sanskardebnath2019@gmail.com" name="email" required>

            <label for="fname"><b>create an Unique ID</b></label>
			<input type="text" placeholder="eg. sanskar@8888111" name="uid" required>

			<label for="id"><b>Create password</b></label>
			<input type="password" placeholder="eg. Sanskar@2130401060" name="psw" required>


			<label for="psw"><b>Your department</b></label>
			<input type="text" placeholder="eg. CSE" name="dept" required>
            
            

            <label for="psw"><b>User post</b></label>
			<input type="text" placeholder="eg. Assistant professor" name="upost" required>

		<input type="submit" name="nullsubmit" id="adminsign" value="register"></input>
		<br><br>
		<label>Allready Signed up ? <a href="login.php">Click here</a></label>
		</div>
	</form>
</body>
</html>
