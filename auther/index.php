<?php
ob_start();
session_start();

if(!isset($_SESSION['id']) && !(int) $_SESSION['id'])
{
  header("location:../");
  exit;
}
header("location:profile.php");

?>