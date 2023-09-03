<?php
include "globalstyle.php";
include "server.php";
session_start();
if (!isset($_SESSION['login_user'])) {
  header("location: login.php");
  die();
}
$logged_user = mysqli_real_escape_string($connection, $_SESSION['login_user']);
$sql = "SELECT * FROM log_sign WHERE id = '$logged_user'";
$result = mysqli_query($connection, $sql);
if (!$result) {
  die('Error: ' . mysqli_error($connection));
}
$user_from_the_device = "";
$_SESSION['user_id'] = '$logged_user';
if (mysqli_num_rows($result) == 1) {
  while ($row = mysqli_fetch_assoc($result)) {
    $user_from_the_device = $row['id'];
    $ema = $row['email'];
    ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>
        <h4 class="alert-heading"><b>Welcome :
            <?php echo $row['fname']; ?>
            <?php echo $row['mname']?>
            <?php echo $row['lname']; ?>
          </b></h4>
      </strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
  }
} else {
  echo 'No details found';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    <style>table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    @media screen and (max-width: 600px) {
      thead {
        display: none;
      }

      tr {
        display: block;
        margin-bottom: 15px;
      }

      td {
        border-bottom: 1px solid #ddd;
      }

      td:before {
        content: attr(data-label);
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
      }
    }

    .table_structure {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      width: 90%;
      overflow: hidden;
    }

    .table_structure h2 {
      margin-bottom: 10px;
      color: #333;
    }

    .table-content {
      overflow-x: auto;
    }

    .table_structure table {
      width: 100%;
      border-collapse: collapse;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    .table_structure th {
      background-color: #007BFF;
      color: #fff;
      padding: 15px 10px;
      text-align: center;
      font-weight: bold;
    }

    .table_structure td {
      border: none;
      padding: 15px 10px;
      text-align: center;
    }

    .table_structure tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table_structure tr:nth-child(odd) {
      background-color: #fff;
    }

    @media screen and (max-width: 768px) {
      .table_structure table {
        box-shadow: none;
      }

      .table_structure th,
      .table_structure td {
        padding: 10px;
      }
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
      transition: background-color 0.6s ease;
      margin: 10px;
    }


    a:hover {
      background-color: blue;

    }

    .carousel-container {
      max-width: 100px;
      max-height: 100px;
      margin: 0 auto;
    }

    .carousel-item img {
      max-width: 70%;
    }

    .carousel-indicators li {
      background-color: #007BFF;
    }

    .carousel-indicators .active {
      background-color: #0056b3;
    }

    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,500,300,700);

    * {
      font-family: Open Sans;
    }

    section {
      display: inline-block;
      background: #333;
      height: 10vh;
      text-align: center;
      font-size: 22px;
      font-weight: 700;
      text-decoration: underline;
    }

    footer {
      background-color: black;
      padding: 20px 0;
      text-align: center;
    }

    .footer-container {
      display: flex;
      justify-content: center;
    }

    .footer-item {
      margin: 0 20px;
    }

    .container-fluid {
      background-color: rgba(0, 0, 1, 1);
    }

    .typing-text {
      white-space: nowrap;
      overflow: hidden;
      animation: typing 15s steps(200), show 1s 10s forwards;
      color: white;
      font-size: 15px;
    }

    @keyframes typing {
      from {
        width: 0;
      }

      to {
        width: 100%;
      }
    }

    @keyframes show {

      from,
      to {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="nav-link active" aria-current="page" href="https://tiaedu.org/" target="_blank"><img width="50"
          height="50" src="./img/ok.png" alt="twitter--v1" /></a>
      <label class="nav-link disable" aria-current="page"><img width="50" height="50" src="./img/jojo.png"
          alt="twitter--v1" /></label>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a href="logout.php"><img width="30" height="30" src="https://img.icons8.com/fluency/30/exit.png"
                alt="exit" /></a>
          </li>
          <a href="create.php?id=<?php echo $logged_user; ?><?php echo "+"; ?>&email=<?php echo $ema; ?>"><img
              width="30" height="30" src="https://img.icons8.com/3d-fluency/25/add-file.png" alt="add-file" /></a>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <center>
    <br><br>
    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#imageCarousel" data-slide-to="1"></li>
        <li data-target="#imageCarousel" data-slide-to="2"></li>
        <li data-target="#imageCarousel" data-slide-to="3"></li>
      </ol>
      <!-- Slides -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="oop.jpg" alt="Image 1">
        </div>
        <!-- Image 2 -->
        <!-- <div class="carousel-item">
          <img src="w (1).jpg" alt="Image 2">
        </div> -->
        <!-- Image 3 -->
        <!-- <div class="carousel-item">
          <img src="w (3).jpg" alt="Image 3">
        </div> -->
        <!-- Image 4 -->
        <!-- <div class="carousel-item">
          <img src="oop.jpg" alt="Image 4">
        </div> -->
      </div>
      <!-- Previous and Next buttons -->
      <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Bootstrap JS (needs to be placed at the end of the body) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </center>
  <!-- table for the user set -->
  <br>
  <div class="alert alert-danger" role="alert">
    <center> <b>Your Activity</b></center>
  </div>
  <?php
  $sql = "select * from conversation where id = '$user_from_the_device' order by serial";
  $result = $connection->query($sql);
  if ($result->num_rows > 0) {
    ?>
    <center>
      <table class="table_structure">
        <thead>
          <th>Sl #</th>
          <th>ID</th>
          <th>Subject</th>
          <th>Conversation</th>
          <th>Token number</th>
        </thead>
        <?php
        $sl = 0;
        while ($row = $result->fetch_assoc()) {
          ?>
          <tr>
            <td>
              <?php echo ++$sl; ?>
            </td>
            <td>
              <?php echo $row['id']; ?>
            </td>
            <td>
              <?php echo $row['subject']; ?>
            </td>
            <td>
              <?php echo $row['comments']; ?>
            </td>
            <td>
              <?php echo $row['token_no']; ?>
            </td>
          </tr>
          <?php
        }
        ?>
      </table>
    </center>
    <?php
    $result->free_result();
  } else {
    ?>
    <div class="alert alert-warning" role="alert">
      No records Found
    </div>

    <?php
  }
  ?>
</body>
<br><br>
<footer class="footer">
  <div class="footer-container">
    <div class="footer-item">
      <a href="https://www.facebook.com/technocollegeofengineering/" target="_blank"><img width="30" height="30"
          src="https://img.icons8.com/color/48/facebook-circled--v1.png" alt="facebook-circled--v1" /></a>
    </div>
    <div class="footer-item">
      <a href="https://www.instagram.com/tcea_official/?hl=en" target="_blank"><img width="30" height="30"
          src="https://img.icons8.com/color/48/instagram-new--v1.png" alt="instagram-new--v1" /></a>
    </div>
    <div class="footer-item">
      <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FTechnoAgartala" target="_blank"><img width="30"
          height="30" src="https://img.icons8.com/color/48/twitter--v1.png" alt="twitter--v1" /></a>
    </div>
    <!-- <div class="footer-item">
      <a href="https://0381.000webhostapp.com/" target="_blank"><img width="30" height="30"
          src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/30/external-me-basic-ui-elements-2.3-sbts2018-outline-color-sbts2018.png"
          alt="external-me-basic-ui-elements-2.3-sbts2018-outline-color-sbts2018" /></a>
    </div> -->
  </div>
  <center>
    <div class="typing-container">
      <p class="typing-text">Created By Department of CSE, TECHNO INDIA AGARTALA, Sanskar Debnath, 3rd Year CSE 2023</p>
    </div>
  </center>
</footer>
<script>
  setTimeout(function () {
    window.location.href = "logout.php";
  }, 1200000); // 5000 milliseconds = 5 seconds
</script>
</html>