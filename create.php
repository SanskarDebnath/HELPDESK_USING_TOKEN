<?php include 'server.php';
include 'globalstyle.php';
    session_start();
    if(!isset($_SESSION['login_user'])){
        header("location:dashboard.php");
        die();
    }
    $logged_user = $_SESSION['login_user'];
    $usrid = "";
    if(isset($_GET['id'])){
        $usrid = (int)$_GET['id'];   
    }
    
$sql="select * from log_sign where id = '$logged_user'";
$result=$connection->query($sql);
$fname = '';
$email = '';
$lname = '';
//echo $fname;
$id_type = 0;
if ($result->num_rows == 1) {  
    while ($row = $result->fetch_object()){ 
    $fname = $row->fname;
    $mname = $row->mname;
    $lname = $row->lname;  
   
    /*echo "++++++";
    echo $email = $row->email;
    echo "++++++";  
    echo $lname = $row->lname; 
    echo "++++++";*/
    $id_type = $row->id;
    }
    $result->close();
} else {
    echo "<script>alert('user does not exist. Please try again')</script>";
}
$first_name = $fname;
$midd_name = $mname;
$last_name = $lname;
//$connection->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      background-color: transparent;
      font-family: Arial, sans-serif;
    }
        body#styled-body {
      background-color: aqua;
      font-family: Arial, sans-serif;
    }

    #navbar {
      background-color: black;
    }

    a {
      text-decoration: none;
      color: inherit;
      display: inline-block;
      padding: 10px 20px;
      border: 1px solid transparent;
      border-radius: 30px;
      background-color: white;
      color: black;
      font-size: 16px;
      text-align: center;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin: 20px;
    }
    
    a:hover {
      background-color: blue;

    }


    #conversation {
      max-width: 1000px;
      margin: 0 auto;
      padding: 35px;
      background-color: black;
      border-radius: 50px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }


    .input-group {
      margin-bottom: 15px;
      border-radius: 50px;
     
    }

    .input-group .input-group-text {
      background-color: green;
      color: white;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      border-radius: 50px;
    }

    .form-control {
      border-radius: 50px;
    }


    select[name="dog-names"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 20px;
      background-color: lightblue;
    }

    select[name="dog-names"] option {
      padding: 8px;
      border-radius: 20px;
    }

 
    label {
      display: block;
      margin-bottom: 5px;
      border-radius: 50px;
      
    }
    .submit-button {
      display: block;
      margin: 0 auto;
      padding: 10px 20px;
      background-color: red;
      color: #fff;
      border: none;
      border-radius: 50px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .submit-button:hover {
      background-color: green;
      transform: scale(1.05);
    }

    #date-input {
  cursor: pointer;
}

</style>
    </head>
<body> 

 <nav class="navbar navbar-expand-lg bg-dark" id="navbar">
    <div class="container-fluid">
      <a class="nav-link active" aria-current="page" href="dashboard.php"><img width="50"
          height="50" src="./img/ok.png" alt="twitter--v1" /></a>
      <label class="nav-link active" aria-current="page" href="dashboard.php"><img width="50" height="50" src="./img/jojo.png"
          alt="twitter--v1" /></label>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">

          </li>
          <li class="nav-item">
            <a href="logout.php"><img width="30" height="30" src="https://img.icons8.com/fluency/30/exit.png"
                alt="exit" /></a>
          </li>
      </div>
    </div>
  </nav>

  <br>

<!-- navbar -->
<br><br>
<!-- form -->
<form action="adminpage.php?admin=3" method="post" id="conversation">
<div class="input-group flex-nowrap">
  <!-- <span class="input-group-text" id="addon-wrapping">Enter the First Name</span> -->
  <input type="hidden" class="form-control" placeholder="MAX 30 characters" aria-label="Username" aria-describedby="addon-wrapping" name="fname" value = "<?php echo $first_name; ?>">
</div>
<div class="input-group flex-nowrap">
  <!-- <span class="input-group-text" id="addon-wrapping">Enter the First Name</span> -->
  <input type="hidden" class="form-control" placeholder="MAX 30 characters" aria-label="Username" aria-describedby="addon-wrapping" name="mname" value = "<?php echo $midd_name; ?>">
</div>
<div class="input-group flex-nowrap">
  <!-- <span class="input-group-text" id="addon-wrapping">Enter the Last name</span> -->
  <input type="hidden" class="form-control" placeholder="MAX 20 characters" aria-label="Username" aria-describedby="addon-wrapping" name="lname" value="<?php echo $last_name; ?>">
</div>
<br>
<div class="input-group mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Issue</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="subject" id="issue-input">
</div>

<div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">About the Issue</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="issue" id = "issue-mega-input">
</div>

<input type="hidden" name="dog-names" id="dog-names" value="3">

<div class="input-group input-group-lg">
  <span class="input-group-text" id="inputGroup-sizing-lg">Suffering From</span>
  <input type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg"  name="date" id="date-input">
</div>

<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping" disabled hidden>ID</span>
  <input type="hidden" name="hdnuid" id="hdnuid" value="<?php echo $id_type;?>"/>
</div>




<?php
$n = 11;

function customDate($format = 'Y-m-d') {
    return date($format);
}

function getRandomCharacters($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, $charactersLength - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

function getName($n) {

    $currentDate = customDate('Ymd');
    $randomChars = getRandomCharacters($n);
    $resultString = "TCEA-".$randomChars . '-' . $currentDate;
    return $resultString;
    
}
?>
<?php
$pop=getName($n);
?>
<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping" disabled hidden>TOKEN NUMBER</span>
  <input type="hidden" name="hdntoken" id="hdntoken" value="<?php echo $pop;?>"/>
</div>
<input type="submit" name="submit_data" class="submit-button" id="submit-button" value="submit">
</form>
<!-- form -->
    </body>

    <script>

    document.addEventListener("DOMContentLoaded", function() {
        var currentDate = new Date().toISOString().split('T')[0];
        var dateInput = document.getElementById("date-input");
        dateInput.max = currentDate;
    });


    document.addEventListener("DOMContentLoaded", function() {
        var issueInput = document.getElementById("issue-input");

        issueInput.addEventListener("input", function() {
            var maxLength = 100;
            var currentLength = issueInput.value.length;

            if (currentLength > maxLength) {
                alert("Exceeded the maximum character limit of " + maxLength);
                issueInput.value = issueInput.value.slice(0, maxLength);
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var issueInput = document.getElementById("issue-mega-input");

        issueInput.addEventListener("input", function() {
            var maxLength = 1000;
            var currentLength = issueInput.value.length;

            if (currentLength > maxLength) {
                alert("Exceeded the maximum character limit of " + maxLength);
                issueInput.value = issueInput.value.slice(0, maxLength);
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("form");
        var dateInput = document.getElementById("issue-input");
        form.addEventListener("submit", function(event) {
            if (!dateInput.value) {
                alert("Issue can not be Empty");
                event.preventDefault();
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("form");
        var dateInput = document.getElementById("issue-mega-input");

        form.addEventListener("submit", function(event) {
            if (!dateInput.value) {
                alert("Description Can not be Empty");
                event.preventDefault();
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var form = document.querySelector("form");
        var dateInput = document.getElementById("date-input");

        form.addEventListener("submit", function(event) {
            if (!dateInput.value) {
                alert("Date Cannot be Empty. Please Select a Date");
                event.preventDefault();
            }
        });
    });

</script>
</html>