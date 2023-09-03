<?php
include "server.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log IN Page</title>
	<style>
body {
  /* background-color: #f1f1f1; */
}

form {
  background-color: black;
  border-radius: 5px;
  padding: 20px;
  width: 400px;
  margin: 50px auto;
  position: relative;
  border-radius: 50px;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  color: white;
}

input[type=text],
input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 50px;
  box-sizing: border-box;
  background-color: black;
  color: white;
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
  background-color: white;
  border-radius: 40px;
  box-shadow: 0px 0px 10px #d3d3d3;
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

@keyframes waterBubbles {
  0% {
    background-position: 0 0;
  }
  100% {
    background-position: 100% 100%;
  }
}

form::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /* background-image: linear-gradient(-45deg, #ff0000, #ff4500, #ff0000, #ff4500, #ff0000, #ff4500); */
  background-size: 300% 300%;
  animation: waterBubbles 10s infinite;
  opacity: 0.5;
  z-index: -1;

} @keyframes loading {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .loading-circle {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 30px;
      height: 30px;
      border: 3px solid rgba(0, 0, 0, 0.1);
      border-top: 3px solid #007BFF;
      border-radius: 50%;
      animation: loading 1s linear infinite;
    }

    #adminlogin {
      display: inline-block;
      padding: 14px 20px;
	    margin: 7px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      width: 40%;
      background-color: #4CAF50;
      color: white;
      position: relative;
    }

    #adminlogin:hover {
      background-color: chocolate;
    }

    #adminlogin::before {
      content: ""; /* Empty content to insert the icon */
      background-image: url('https://img.icons8.com/color/35/enter-2.png');
      background-size: cover;
      width: 35px;
      height: 35px;
      position: absolute;
      left: 10px; /* Adjust as needed */
      top: 50%;
      transform: translateY(-50%);
    }


</style>
</head>
<body>
	<form id="admin-login-form" action="adminpage.php?admin=2" method="POST">
		<h2>Log in</h2>

		<?php 
if(isset($_REQUEST["err"]))
    if($_REQUEST["err"] == 1)
	    $msg="Username and password are not matched with required details";
?>

<?php
if(isset($msg)){
    echo $msg;
}
?>	
		<div class="container">
			<label for="id"><img width="35" height="35" src="https://img.icons8.com/tiny-color/30/user.png" alt="user"/></label>
			<input type="text" name="aid" placeholder="Enter the Employee ID here" required>
			<label for="pasw"><img width="35" height="35" src="https://img.icons8.com/color/35/private2--v1.png" alt="private2--v1"/></label>
			<input type="password" name="pasw" placeholder="Enter the password here" required>
			<label for="retype-pasw"><img width="35" height="35" src="https://img.icons8.com/color/35/unlock-2.png" alt="unlock-2"/></label>
            <input type="password" name="retype_pasw" id="retype-pasw" placeholder="Retype the password here" required>
            <br>
			<div id="adminlogin-container">
                <input type="submit" name="adminlogin" id="adminlogin" value="Log in">
            </div>
		<br><br>
		<label>
			<b>Yet not signed up?</b>
			<a href="signup.php"> click here
		</a>
		</label>
		</div>
	</form>
</body>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var adminLoginForm = document.getElementById("admin-login-form");
            var passwordField = document.getElementsByName("pasw")[0];
            var retypePasswordField = document.getElementsByName("retype_pasw")[0];
            
            adminLoginForm.addEventListener("submit", function(event) {
                var password = passwordField.value;
                var retypePassword = retypePasswordField.value;

                if (password !== retypePassword) {
                    alert("Passwords do not match. Please retype the password correctly.");
                    event.preventDefault();
                }
            });
        });
    </script>
</html>