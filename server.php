<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk";
$connection = new mysqli($server,$username,$password,$dbname);
if($connection->connect_error)
{
    die("connection failed ".$connection->connect_error);
}
?>