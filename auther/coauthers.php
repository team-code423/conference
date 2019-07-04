<?php
require "database.php";
session_start();


if(!isset($_SESSION['id']) && !(int) $_SESSION['id'])
{
  header("location:../index.php");
  exit;
}


$_group = $_SESSION['group'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {

        $fname = $_POST['fname'];

        $lname = $_POST['lname'];

        $email = $_POST['email'];
        
        $city = $_POST['city'];

        $org = $_POST['org'];

        $telnum = $_POST['telnum'];
        
       
        $errors = [];
        $auth_id = $_SESSION['id'];
       
        if (empty($errors)) {

            $sql = "INSERT INTO `auther`(`A-fname`,`A-lname`,`A-email`,`state`,`phone`,`co-group`)VALUES ('$fname','$lname','$email','$city','$telnum','$_group')";

            if(mysqli_query($connect , $sql))
            {
               echo "all done !";
                
               
            }else{
                echo mysqli_error($connect);
                print_r($errors);
            }

        }

    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>add co-authers</title>
    <link rel="stylesheet" href="Submition.css">
</head>

<body>
    <div class="continer">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

            <div class="authorinfo">
                <strong>
                    <p class="authorno">Author 1</p>
                </strong>


                <div>
                    <p class="formrow">Fisrt Name :</p>
                    <p class=textb><span class="wpcf7-form-control-wrap author1name"><input type="text" name="fname" /></span></p>
                </div>

                <div>
                    <p class="formrow">Last Name :</p>
                    <p class=textb><span class="wpcf7-form-control-wrap authorinstitiue"><input type="text" name="lname" /></span></p>
                </div>

                <div>
                    <p class="formrow">E-mail :</p>
                    <p class=textb><span class="wpcf7-form-control-wrap authoruni"><input type="email" name="email" /></span></p>
                </div>

                <div>
                    <p class="formrow">City, Country:</p>
                    <p class=textb><span class="wpcf7-form-control-wrap city"><input type="text" name="city" /></span></p>
                </div>

                <div>
                    <p class="formrow">Organization:</p>
                    <p class=textb><span class="wpcf7-form-control-wrap city"><input type="text" name="org" /></span></p>
                </div>

                <div>
                    <p class="formrow">Contact No</p>
                    <p class=textb><span class="wpcf7-form-control-wrap telnum"><input type="tel" name="telnum" /></span></p>
                </div>

            </div>

            
            <input type="submit" value="submit" name="submit">

        </form>

    </div>
</body>

</html>