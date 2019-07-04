<?php
require "database.php";

session_start();

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {

        $fname = $_POST['fname'];

        $lname = $_POST['lname'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $gender = $_POST['gender'];

        $v_pass = $_POST['v_password'];

        $company = $_POST['company'];

        $faculty = $_POST['faculty'];
        $address = $_POST['address'];
        $country = $_POST['country'];

        $dep = $_POST['department'];

        $state = $_POST['state'];

        $phone = $_POST['mobile'];

        $errors = [];

        if ($password != $v_pass) {
            $errors[] = "password not match";
        }
        if (empty($errors)) {

            $sql = "UPDATE  `auther` SET `A-fname` = '$fname' ,`A-lname` = '$lname', `A-email` = '$email' , `password` = '$password' , `gender` = '$gender' , `company` = '$company' , `faculty` = '$faculty' , `department` = '$dep' ,`state` = '$state' , `country` = '$country' , `phone`  = '$phone' , `A-address` = '$address' WHERE `A-id` = '$id' ";


            if(mysqli_query($connect , $sql))
            {
                $_SESSION['fullname'] = $fname." ".$lname;
                $_SESSION['email'] = $email;
                $_SESSION['gender'] = $gender;
                $_SESSION['address'] = $address;
                $_SESSION['company'] = $company;
                $_SESSION['country'] = $country;
                $_SESSION['dep'] = $dep;
                $_SESSION['phone'] = $phone;
                $_SESSION['faculty'] = $faculty;
                $_SESSION['state'] = $state;
                $_SESSION['phone'] = $phone;
                
                header("location:profile.php");
                exit;
            }else{
                echo mysqli_error($connect);
            }

        }

    }
}

?>