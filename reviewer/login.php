<?php

session_start();
require "database.php";

if(isset($_SESSION['reviewer_id'])){
    header("location: index.php");
    exit;
}


if(isset($_POST['submit'])){

    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    if(!empty($email) && !empty($pass)){
    
    $sql = " select * from reviewer where email = '$email' and password = '$pass';";
    
    $query = mysqli_query($connect,$sql);
    if($query){

        $row = mysqli_fetch_assoc($query);
        $_SESSION['reviewer_id'] = $row['R-id'] ;
        header("location: index.php");
        exit;
    
    }else{
    
        echo "login failed".mysqli_error($con);
    }
    
    
    }else{
        echo "all fields required";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<h3 class="text-center">login or <a href="register.php">register</a></h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pass">
  </div>
  
  <input type="submit" class="btn btn-primary" name="submit" value="login">

</form>
    </div>
</body>
</html>