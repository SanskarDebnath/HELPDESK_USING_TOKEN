<?php
require 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #f1f1f1;
      padding: 50px;
    }

    p {
      font-size: 18px;
      color: #fff;
    }

    form {
      display: inline-block;
      margin-top: 20px;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 0 10px;
    }

    #id {
      background-color: #4CAF50;
      color: white;
    }

    .button {
      background-color: #f44336;
      color: white;
    }

    #id:hover, .button:hover {
      opacity: 0.8;
    }
    .get{
      background-color: black;
      width: 50%;
      height: 50%;
      padding: 70px;
      margin: 2px;
      border-radius: 50px;
      
    }
  </style>
</head>
<body>
    <center>
        <div class="get" id="get">
            <p>Do you really want to delete all the Action Taken conversations?</p>
            <button onclick="confirmDelete()">Yes</button>
            <button class="button" onclick="window.location.href='admin_dashboard.php'">No</button>
        </div>

        <script>
            function confirmDelete() {
                if (confirm("Are you sure you want to delete?")) {
                    window.location.href = "adminpage.php?admin=7";
                }
            }
        </script>
    </center>
</body>
</html>