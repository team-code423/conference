<?php
require "../inc/database.php";
session_start();

if (!isset($_SESSION['attendee']) && !(int) $_SESSION['attendee']) {
    header("location:../index.php");
}

$id = $_SESSION['attendee'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $gender = $_POST['gender'];

        $v_pass = $_POST['v_password'];


        $errors = [];

        if ($password != $v_pass) {
            $errors[] = "password not match";
        }
        if (empty($errors)) {

            $sql = "UPDATE  `attendee` SET `name` = '$name' , `email` = '$email' , `pass` = '$password'  WHERE `id` = '$id' ";


            if(mysqli_query($connect , $sql))
            {
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                
                header("location:attendee.php");
                exit;
            }else{
                echo mysqli_error($connect);
            }

        }

    }
}

?>