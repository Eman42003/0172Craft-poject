<?php
$con = new mysqli("localhost", "root", "", "craft");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>