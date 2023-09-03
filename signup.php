<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
    <style>
        body {
            background-color: #f1f1f1;
        }
        
        form {
            background-color: black;
            border-radius: 50px;
            padding: 20px;
            box-shadow: 0px 0px 10px #d3d3d3;
            width: 400px;
            margin: 50px auto;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }
        select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 40px;
        box-sizing: border-box;
        background-color: black;
        color: white;
    }
        
        input[type=text], input[type=password], input[type=number] {
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
            border-radius: 50px;
            cursor: pointer;
            width: 100%;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .container {
            padding: 16px;
            background-color: #fff;
            border-radius: 20px;
        }
        
        span.password {
            float: right;
            padding-top: 16px;
            color: white;
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
            border-radius: 50px;
        }
        #adminsign:hover {
            background-color: blue;
        }
    </style>
</head>
<body>
    <form class="cont" id="cont" action="adminpage.php?admin=1" method="POST">
        <h2>Sign Up</h2>
        <div class="container">
            <label for="fname"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fname" id ="fname">

            <label for="fname"><b>First Name</b></label>
            <input type="text" placeholder="Enter Middle Name if any" name="mname" id ="mname">

            <label for="fname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="lname" id = "lname">

            <label for="fname"><b>Enter the Gmail Here</b></label>
            <input type="text" placeholder="Enter Gmail here" name="email" id="email">

            <label for="branch_select"><b>Branch Specialized in</b></label>
            <select name="branch">
                <option ="">--select--</option>
                <option = "Advanced Mechatronics & Industrial Automation">Advanced Mechatronics & Industrial Automation</option>
                <option = "Civil Engineering with Computer Application">Civil Engineering with Computer Application</option>
                <option = "Civil Engineering">Civil Engineering</option>
                <option = "Computer Science and Engineering">Computer Science and Engineering</option>
                <option = "Electrical and Computer Science Engineering">Electrical and Computer Science Engineering</option>
                <option = "Electrical Engineering">Electrical Engineering</option>
                <option = "Electronics & Communication Engineering">Electronics & Communication Engineering</option>
                <option = "Mechanical Engineering">Mechanical Engineering</option>
            </select>

            <label for="id"><b>Employee ID</b></label>
            <input type="text" placeholder="Enter the Employee id  eg. Sans@0381" name="id">

            <button class="button" id="redef_username"> click here if not have any Employee id</button>

            <label for="id"><b>Contact number</b></label>
            <input type="number" placeholder="Enter the Contact number" name="phone" id="phone">

            <label for="psw"><b>Create New Password</b></label>
            <input type="password" placeholder="Create New Password" name="psw" id="password">
            
            <input type="submit" name="adminsign" id="adminsign" value="sign up"></input>
            <br><br>
            <label >Already Signed up? <a href="login.php">Click here</a></label>
        </div>
    </form>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var signUpForm = document.getElementById("cont");
        var firstNameField = document.getElementsByName("fname")[0];
        var lastNameField = document.getElementsByName("lname")[0];

        signUpForm.addEventListener("submit", function(event) {

            if (containsNumeric(firstNameField.value)) {
                alert("First name cannot contain numeric values.");
                event.preventDefault(); // Prevent form submission
                return;
            }


            if (containsNumeric(lastNameField.value)) {
                alert("Last name cannot contain numeric values.");
                event.preventDefault(); // Prevent form submission
            }
        });


        function containsNumeric(value) {
            return /\d/.test(value);
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("form");
        var dateInput = document.getElementById("fname");

        form.addEventListener("submit", function(event) {
            if (!dateInput.value) {
                alert("First Name Can not Be empty");
                event.preventDefault();
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
            var mnameInput = document.getElementById("mname");

            mnameInput.addEventListener("input", function() {
                if (containsNumeric(mnameInput.value)) {
                    alert("Middle name cannot contain numeric values.");
                    mnameInput.value = ''; // Remove the content of the input field
                }
            });

            function containsNumeric(value) {
                return /\d/.test(value);
            }
        });

    document.addEventListener("DOMContentLoaded", function() {
        var signUpForm = document.getElementById("cont");
        var mnamefield = document.getElementsByName("mname")[0];

        signUpForm.addEventListener("submit", function(event) {
            var mnamenumber = mnamefield.value;
            
            if (mnamenumber.length >= 11) {
                alert("Middle name must be less than 11 characters.");
                event.preventDefault(); // Prevent form submission
            }
        });
    });   
    
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("form");
        var dateInput = document.getElementById("lname");

        form.addEventListener("submit", function(event) {
            if (!dateInput.value) {
                alert("Last name Can not be Empty");
                event.preventDefault();
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("form");
        var dateInput = document.getElementById("email");

        form.addEventListener("submit", function(event) {
            if (!dateInput.value) {
                alert("Email Can not be Empty");
                event.preventDefault();
            }
        });
    });
    
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("form");
        var dateInput = document.getElementById("id");

        form.addEventListener("submit", function(event) {
            if (!dateInput.value) {
                alert("Employee Id Can not be Empty");
                event.preventDefault();
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
            var redefButton = document.getElementById("redef_username");
            var idInput = document.getElementsByName("id")[0];
            var fnameInput = document.getElementById("fname");

            redefButton.addEventListener("click", function() {
                var randomString = generateRandomString();
                idInput.value = randomString;
            });

            function generateRandomString() {
                var characters = "abcdefghijklmnopqrstuvwxyz0123456789";
                var randomString = "";
                for (var i = 0; i < 10; i++) {
                    var randomIndex = Math.floor(Math.random() * characters.length);
                    randomString += characters.charAt(randomIndex);
                }
                
                var currentYear = new Date().getFullYear();
                var formattedName = fnameInput.value.slice(0, 4).toLowerCase();
                var formattedRandomString = randomString.slice(0, 2);

                return formattedName + "@" + currentYear + "-" + formattedRandomString;
            }
        });

	document.addEventListener("DOMContentLoaded", function() {
        var signUpForm = document.getElementById("cont");
        var passwordField = document.getElementsByName("psw")[0];

        signUpForm.addEventListener("submit", function(event) {
            var password = passwordField.value;

            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                event.preventDefault();
                return;
            }

            var strongPasswordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
            if (!strongPasswordRegex.test(password)) {
                alert("Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.");
                event.preventDefault();
            }
        });
    });

    
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("form");
        var dateInput = document.getElementById("phone");

        form.addEventListener("submit", function(event) {
            if (!dateInput.value) {
                alert("The Contact Number Can not be empty");
                event.preventDefault();
            }
        });
    });


	document.addEventListener("DOMContentLoaded", function() {
        var signUpForm = document.getElementById("cont");
        var phoneField = document.getElementsByName("phone")[0];

        signUpForm.addEventListener("submit", function(event) {
            var phoneNumber = phoneField.value;
            
            if (phoneNumber.length >= 11) {
                alert("Phone number must be less than 11 characters.");
                event.preventDefault(); // Prevent form submission
            }
        });
    });

    
	document.addEventListener("DOMContentLoaded", function() {
        var signUpForm = document.getElementById("cont");
        var employeeIdField = document.getElementsByName("id")[0];
        var passwordField = document.getElementsByName("psw")[0];

        signUpForm.addEventListener("submit", function(event) {
            var employeeId = employeeIdField.value;
            var password = passwordField.value;

            if (employeeId === password) {
                alert("Employee ID and Password cannot be same.");
                event.preventDefault(); // Prevent form submission
            }
        });
    });


</script>
</html>