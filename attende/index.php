<?php

session_start();

if(!isset($_SESSION['id']) && !(int) $_SESSION['id'])
{
  header("location:login.php");
  exit;
}
header("location:profile.php");

?>