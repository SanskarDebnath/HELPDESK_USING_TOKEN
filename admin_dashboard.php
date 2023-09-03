<?php
include "globalstyle.php";
include "server.php";
session_start();

if (!isset($_SESSION['login_user'])) {
  header("location: index.php?err=2");
  die();
}
$logged_user = mysqli_real_escape_string($connection, $_SESSION['login_user']);
$sql = "SELECT * FROM admin_page WHERE id = '$logged_user'";
$result = mysqli_query($connection, $sql);
if (!$result) {
  die('Error: ' . mysqli_error($connection));
}
$_SESSION['user_id'] = $logged_user;
if (mysqli_num_rows($result) == 1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $user_from_the_device = $row['id'];
    $ema = $row['email'];
    ?>
    <?php
  }
} else {
  echo 'No details found';
}
mysqli_free_result($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>User Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,500,300,700);
    .navbar {
      background-color: #333;
      overflow: hidden;
      font-size: 16px;
      font-weight: bold;
    }

    .navbar a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 18px;
      transition: all 0.3s ease-in-out;
    }

    .navbar a:hover {
      background-color: #ddd;
      color: black;
    }

    .navbar a i {
      margin-right: 5px;
    }

    .navbar .dropdown button i {
      margin-right: 5px;
    }

    .navbar .dropdown-content a i {
      margin-right: 5px;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 18px;
      border: none;
      outline: none;
      color: #f2f2f2;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-content a
    {
float: none;
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
text-align: left;
}

.dropdown-content a:hover {
background-color: #ddd;
color: black;
}

.dropdown:hover .dropdown-content {
display: block;
}

@media screen and (max-width: 600px) {
.navbar a:not(:first-child), .dropdown .dropbtn {
display: none;
}
.navbar a.icon {
float: right;
display: block;
}
}

@media screen and (max-width: 600px) {
.navbar.responsive .icon {
position: absolute;
right: 0;
top: 0;
}
.navbar.responsive a {
float: none;
display: block;
text-align: left;
}
.navbar.responsive .dropdown {
float: none;
}
.navbar.responsive .dropdown-content {
position: relative;
}
.navbar.responsive .dropdown .dropbtn {
display: block;
width: 100%;
text-align: left;
}
}
    body {
        color: #000000;
		background: #ffffff;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
    .table-responsive {
        margin: 2px 0;
    }
	.table-wrapper {
        min-width: 100%;
        background: black;
        padding: 20px 25px;
		    border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        width: 100%;
    }
	.table-title {
		padding-bottom: 15px;
		background: #ff740a;
		color: #ffffff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    background-color: red;
    
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn {
		color: #2f00ff;
		float: right;
		font-size: 13px;
		background: #ffffff;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn:hover, .table-title .btn:focus {
        color: #ff0000;
		background: #f2f2f2;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #1c1b1b;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
	.status {
		font-size: 30px;
		margin: 2px 2px 0 0;
		display: inline-block;
		vertical-align: middle;
		line-height: 10px;
	}
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }
  </style>
  <script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<div class="navbar">
    <a href="admin_dashboard.php"><i class="fas fa-home"></i>Home</a>
    <a href="free_result.php"><i class="fa fa-trash-o"></i>Free Result</a>
    <a href="logout2.php"><i class="fa fa-sign-out"></i>Log Out</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fas fa-bars"></i>
    </a>
  </div>
  <?php
  $sql = "select * from conversation order by comment_date desc,priority asc";
  $result = $connection->query($sql);
  if ($result->num_rows > 0) {
    ?>
        <?php
        $sl = 0;
      ?>
<body>
<div class="alert alert-danger" role="alert">
    <center><b>Recent Activities From Different Peoples</b></center>
  </div>
<div class="container-fluid">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-5">
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Full Name</th>						
                        <th>Subject</th>
                        <th>Issue</th>
                        <th>Token</th>
                        <th>Issue From</th>
                        <th>Token Registered</th>
                        <th>Action</th>
                    </tr>
                </thead><?php
                while ($row = $result->fetch_assoc()) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo ++$sl; ?></td>
                        <td><a href="#"><?php echo $row['fname'];?> <?php echo $row['mname'];?> <?php echo $row['lname'];?></a></td>
                        <td><b><?php echo $row['subject'];?></b></td>                        
                        <td><b><?php echo $row['comments'];?></b></td>
                        <td><?php echo $row['token_no'];?></td>
                        <td><?php echo $row['comments_date'];?></td>
                        <td><?php echo $row['comment_date'];?></td>
                        <td>
                          <a href="action.php?id=<?php echo $row['id'];?>&sl=<?php echo $row['serial']?>" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                        </td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
            </table>
            <?php
    $result->free_result();
  } else {
    ?>
    <div class="alert alert-danger" role="alert">
      No record found
    </div>

    <?php
  }
  ?> 
        </div>
    </div>        
</div>     
</body>
<br><br>
<script>
    function myFunction() {
      var x = document.getElementsByClassName("navbar")[0];
      if (x.className === "navbar") {
        x.className += " responsive";
      } else {
        x.className = "navbar";
      }
    }
    setTimeout(function() {
            window.location.reload();
        }, 600000);//auto refresh after 10 miniutes :)
  </script>
</html>