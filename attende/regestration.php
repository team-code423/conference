<?php
 require "../inc/database.php";


session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];

        $email = $_POST['email'];

        $pass = $_POST['pass'];
        

        $vpass = $_POST['vpass'];

      
        $errors = [];

        if ($pass != $vpass) {
            $errors[] = "password not match";
        }
        if (empty($errors)) {

            $sql = "INSERT INTO `attendee`(`name`,`email`,`pass`)VALUES ('$name','$email','$pass') ";


            if(mysqli_query($connect , $sql))
            {
                $_SESSION['attendee'] = mysqli_insert_id($connect);
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header("location:attendee.php");
            }else{
                echo mysqli_error($connect);
            }

        }

    }
}

?>
<html>
<head>
    
    
    
        <meta charcet="UTF-8">
        <title> regestration</title>
        <link rel="stylesheet" href="style.css"> 
    
</head>

<body>
  <div id="login-box">
  <div class="left">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <h1>Sign up</h1>
    
    <input type="text"     name="name" placeholder="Full Name" />
    <input type="text"     name="email" placeholder="E-mail" />
    <input type="password" name="pass" placeholder="Password" />
    <input type="password" name="vpass" placeholder="Retype password" />
    
    <input type="submit" name="submit" value="Sign me up" />
    </form>
  </div>
  
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>
  </div>
  <div class="or">OR</div>
</div>  
    
</body>
</html>