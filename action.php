<?php
include 'server.php';
require 'globalstyle.php';
session_start();
$usrid = 0;
$usr_ser = 0;
if (isset($_GET['id']) && isset($_GET['sl'])) {
  $usrid = (int) $_GET['id'];
  $usr_ser = (int) $_GET['sl'];
}

$sql = "SELECT * FROM conversation WHERE id = $usrid AND serial = $usr_ser";
$result = $connection->query($sql);
$fname = '';
$lname = '';
$subject = '';
$comments = '';
$token_no = '';
$uid = 0;
$ser = 0;
if ($result->num_rows > 0) {
  $row = $result->fetch_object();
  $fname = $row->fname;
  $lname = $row->lname;
  $subject = $row->subject;
  $comments = $row->comments;
  $token_no = $row->token_no;
  $uid = $row->id;
  $ser = $row->serial;
} else {
  echo "Error: Record not found";
}
$connection->close();
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Action Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      padding: 50px;
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 50px;
      margin-bottom: 20px;
      padding: 20px;
      background-color: black;
    }

    .blockquote {
      font-size: 18px;
      margin-bottom: 0;
      color: white;
    }

    .blockquote-footer {
      font-size: 14px;
      color: #666;
      margin-top: 5px;
      color: white;
    }

    .Form_submit {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 30px;
      background-color: black;
    }

    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      border-radius: 5px;
    }

    .input-group-text {
      background-color: #007BFF;
      color: #fff;
      padding: 8px 12px;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      border-radius: 20px;
    }

    .form-control {
      flex: 1;
      padding: 8px;
      border: 1px solid #ccc;
      border-left: none;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }

    .custom-button {
      display: block;
      width: 50%;
      padding: 10px 20px;
      margin-top: 10px;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      background-color: green;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .custom-button:hover {
      background-color: yellowgreen;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="card-body">
      <blockquote class="blockquote mb-0">
        <p>
          <b><?php echo $subject; ?><br><br></b>
          <?php echo $comments; ?>
        </p><br>
        <footer class="blockquote-footer"><cite title="Source Title"><b>
          <?php echo $fname . " " . $lname; ?></b></cite></footer>
      </blockquote>
    </div>
  </div>
  <form action="adminpage.php?admin=6" method="POST" class="Form_submit" id="Form_submit">
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Write on it</span>
      <input type="text" class="form-control" placeholder="Describe About Your action" aria-label="Username"
        aria-describedby="basic-addon1" name="Desc">
    </div>
    <input type="text" class="form-control" placeholder="Enter your full name" aria-label="Username"
      aria-describedby="basic-addon1" name="clientname">
    <input type="hidden" name="uid" id="uid" value="<?php echo $uid; ?>">
    <input type="hidden" name="serial" id="serial" value="<?php echo $ser; ?>">
    <input type="hidden" name="token" id="token" value="<?php echo $token_no; ?>">
    <input type="submit" name="actionbtn" id="adminlogin" value="Take action" class="custom-button">
  </form>
</body>
</html>
