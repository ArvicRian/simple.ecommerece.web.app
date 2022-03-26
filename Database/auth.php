<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: ../login/login.form.php");
exit(); }
?>